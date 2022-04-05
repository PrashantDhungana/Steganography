<?php

namespace App\Models;

use App\Http\Traits\EncodeDecodeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Component\HttpFoundation\File\File;



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

        $file = new File('images/'.$this->image);
        
        return $encrypter->decrypt($this->desteganize($file));
    }

    public function setPassphraseAttribute($value)
    {
        $this->attributes['passphrase'] = Crypt::encrypt($value);
    }

    public function getPassphraseAttribute($value)
    {
        return Crypt::decrypt($value);
    }
}
