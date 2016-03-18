<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    Protected $table = 'patients';

    Protected $primaryKey = 'patient_id';

    Public function consultations() {
    	return $this->hasMany('\App\ConsultationModel','patient_id','patient_id');
    }
}
