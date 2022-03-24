<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Traits\EncodeDecodeTrait;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    use EncodeDecodeTrait;
    public function index(Request $request){
        
        // split the string on commas
        $data = explode( ',', $request->image );

        // Obtain the original content (usually binary data)
            $bin = base64_decode($data[1]);

        // Load GD resource from binary data
        $image = imageCreateFromString($bin);
        
        $img_file = 'apiImages/'.uniqid('api_').'.png';
        imagepng($image, $img_file, 9);

        $imageInfo = $this->steganize($image,$request->encode_text,true);
        dd($imageInfo);
    
    }
    
}
