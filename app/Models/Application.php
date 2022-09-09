<?php

namespace App\Models;

use App\Models\Programs;
use App\Models\Selectedsub;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class Application extends Model
{
    use HasFactory;
    use Notifiable;
    protected $primaryKey = 'id';
    protected $fillable = ['lastName', 'firstName', 'middleName', 'birthDate', 'gender', 'email', 'phone', 'status', 'company', 'address', 'applicantImage', 'programs_id', 'subjects_id', 'applicant_id, adviser'];
    protected $table = 'applications';

    public function programs()
    {

        return $this->hasMany(Programs::class);
    }

    public function Selectedsub()
    {

        return $this->hasMany(Selectedsub::class);
    }
    public function getAge()
    {
        //return dd($this->birthDate);
        //ageCalculate
        return Carbon::parse($this->birthDate)->diff(Carbon::now())->format('%y');
    }
}
