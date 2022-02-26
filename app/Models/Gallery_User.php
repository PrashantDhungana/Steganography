<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery_User extends Model
{
    use HasFactory;
    public function gallery(){

        return $this->belongsTo(Gallery::class);
    }
    public function user(){

        return $this->belongsTo(User::class);
    }
}
