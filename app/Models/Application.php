<?php

namespace App\Models;

use App\Models\Programs;
use App\Models\Selectedsub;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['lastName', 'firstName', 'middleName', 'birthDate', 'gender', 'email', 'phone', 'status', 'company', 'address','applicantImage'];
    protected $table = 'applications';

    public function programs(){

        return $this->hasMany(Programs::class); 
    }
    
    public function Selectedsub(){

        return $this->hasMany(Selectedsub::class);
    }
}
