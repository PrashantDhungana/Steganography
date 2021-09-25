<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class email extends Model
{
    public function User()
    {
        return $this->belongsTo(\App\User::class);
    }
}

