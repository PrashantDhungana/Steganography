<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    public function User()
    {
        return $this->belongsTo(\App\User::class);
    }
}
