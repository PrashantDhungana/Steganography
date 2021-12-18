<?php

namespace App\Http\Controllers;

use App\Http\Traits\EncodeDecodeTrait;
use Illuminate\Http\Request;

class EncodeDecodeController extends Controller
{
    use EncodeDecodeTrait;
    
    public function encode()
    {
        $name = request()->name;
        // return $this->steganize()
    }
}
