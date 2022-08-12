<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    use HasFactory;
    protected $table = 'terms';
    protected $primaryKey = 'id';
    protected $fillable = [
        'year',
        'label',
        'status',
    ];
}
