<?php

namespace App\Models;

use App\Http\Traits\EncodeDecodeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory,EncodeDecodeTrait;
    
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function getDecodedAttribute()
    {
        return $this->desteganize('images/'.$this->image);
    }
}
