<?php

namespace App\Models;

use App\Models\Programs;
use App\Models\Selectedsub;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subjects extends Model
{
    use HasFactory;

    protected $table='subjects';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];

    
    public function programs(){

        return $this->belongsTo(Programs::class); 
    }

    public function Selectedsub(){

        return $this->belongsTo(Selectedsub::class);
    }

}