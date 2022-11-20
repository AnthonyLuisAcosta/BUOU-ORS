<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remarks extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['application_id',
    'user','input','timestamps'];
}
