<?php

namespace App\Models;

use App\Models\Subjects;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Selectedsub extends Model
{
    use HasFactory;

    protected $table='programs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'selected_sub',
        'applicant_id',
    ];

    
    public function application(){

        return $this->belongsTo(Application::class); 
    }

    public function subjects(){

        return $this->hasMany(Subjects::class); 
    }

}