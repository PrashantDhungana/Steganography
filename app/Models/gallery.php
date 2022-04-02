<?php

namespace App\Models;

use App\Http\Traits\EncodeDecodeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\SoftDeletes;


class Gallery extends Model
{
    use HasFactory,EncodeDecodeTrait;
    use SoftDeletes;
    
    
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function getDecodedAttribute()
    {
        $passphrase = $this->passphrase;
        $encrypter = new \Illuminate\Encryption\Encrypter($passphrase, 'AES-128-CBC');

        return $encrypter->decrypt($this->desteganize('images/'.$this->image));
    }
}
