<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classes\Staff;
use App\Classes\PatientObject as Patient;
use App\Http\Requests\CreatePatientRequest as CPR;
use Carbon\Carbon;

class PatientRUDController extends Controller
{
    Public $staff;

    Public function __construct(Staff $staff, Request $r) {
      \Session::put('patient_id',$r->segment(3));
      $this->staff = $staff;
    }

    Public function getShowPatient(Patient $patient) {
      return view('patients_show',['patient'=>$patient->getProfile(),'patientConsults'=>$patient->myConsultations()->take(5)]);
    }

}
