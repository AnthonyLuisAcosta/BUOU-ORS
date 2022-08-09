<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    
    public function application(){

        return $this->belongsTo(Programs::class); 
    }

}