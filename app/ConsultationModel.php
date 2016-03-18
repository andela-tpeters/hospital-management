<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultationModel extends Model
{
    Protected $table = 'consultation';
    // Protected $primaryKey = 'patient_id';

    Protected $fillable = ['doctor_id','diagnosis','treatment','prescriptions','lab_tests'];

    Public function doctor() {
    	// return $this->belongsTo('\App\DoctorModel')
    }

    Public function patient() {
    	return $this->belongsTo('\App\Patient','patient_id','patient_id');
    }

    Public function allPatients() {
    	return $this->hasMany('\App\Patient','patient_id','patient_id');
    }
}
