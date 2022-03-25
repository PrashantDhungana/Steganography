<?php

namespace App\Models;

use App\Http\Traits\EncodeDecodeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        return $this->desteganize('images/'.$this->image);
    }
}
