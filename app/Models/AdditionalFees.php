<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalFees extends Model
{
    use HasFactory;
    protected $table = 'additional_fees';
    protected $primaryKey = 'id';
    protected $fillable = [
        'label',
        'cost',
    ];
}
