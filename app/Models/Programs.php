<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    use HasFactory;

    protected $table='programs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'code',
        'description',
        'adviser',
        'dean',
        'registrar',
    ];

        //program and user relationship 
        public function users()
        {
            $this->belongsTo('App\User');
        }
}