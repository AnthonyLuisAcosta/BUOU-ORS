<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    //user and role relationship 
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
