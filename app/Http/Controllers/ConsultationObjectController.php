<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classes\ConsultationObject as Consultation;
use App\Classes\Staff;

class ConsultationObjectController extends Controller
{

    function __construct(Request $r) {
      \Session::put('patient_id', $r->segment(3));
      \Session::put('consultation_id', $r->segment(4));

    }

    Public function getViewConsultation(Consultation $consultation,Staff $staff) {
      return view('consultation.show',['patientConsults'=>$consultation->thisConsult(),'staff'=>$staff->getProfile()]);
    }

    
}
