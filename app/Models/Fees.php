<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    use HasFactory;
    protected $table = 'fees';
    protected $primaryKey = 'id';
    protected $fillable = [
        'appRef_id',
        'fees',
        'addFees1',
        'addFees2',
        'addFees3',
        'addFees4',
        'addFees5',
        'addFees6',
        'addFees7',
        'addFees8',
        'addFees9',
        'addFees10',
        'addCost1',
        'addCost2',
        'addCost3',
        'addCost4',
        'addCost5',
        'addCost6',
        'addCost7',
        'addCost8',
        'addCost9',
        'addCost10',
        'total',
        'balance',
        'status',
        'receipt',
    ];

    public function Application()
    {
        return $this->hasMany(Application::class);
    }
}
