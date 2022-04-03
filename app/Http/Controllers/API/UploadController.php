<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Traits\EncodeDecodeTrait;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;


class UploadController extends Controller
{
    use EncodeDecodeTrait;
    public function encode(Request $request){
        
        $base64File = $request->input('image');

        // decode the base64 file
        $fileData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64File));
        
        // save it to temporary dir first.
        $tmpFilePath = sys_get_temp_dir() . '/' . Str::uuid()->toString();
        file_put_contents($tmpFilePath, $fileData);
        
        // this just to help us get file info.
        $tmpFile = new File($tmpFilePath);
        
        $file = new UploadedFile(
            $tmpFile->getPathname(),
            $tmpFile->getFilename(),
            $tmpFile->getMimeType(),
            0,
            true // Mark it as test, since the file isn't from real HTTP POST.
        );

        $encrptedText = Crypt::encryptString($request->encode_text);

        $imageInfo = $this->steganize($file,$encrptedText,true);
        
        $path = 'images/'.$imageInfo[0];
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        dd($base64);
        
    
    }

    public function decode(Request $request)
    {
        $base64File = $request->input('image');
        $fileData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64File));

        // save it to temporary dir first.
        $tmpFilePath = sys_get_temp_dir() . '/' . Str::uuid()->toString();
        file_put_contents($tmpFilePath, $fileData);
        
        // this just to help us get file info.
        $tmpFile = new File($tmpFilePath);
        return $this->desteganize($tmpFile);
    }
    
}
