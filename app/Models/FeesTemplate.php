<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesTemplate extends Model
{
    use HasFactory;
    protected $table = 'fees_template';
    protected $primaryKey = 'id';
    protected $fillable = [
        'type',
        'units',
        'admission',
        'tuition',
        'matricula',
        'medical',
        'library',
        'athletic',
        'cultural',
        'guidance',
        'scuaa',
        'distLearn',
        'total',
    ];
}
