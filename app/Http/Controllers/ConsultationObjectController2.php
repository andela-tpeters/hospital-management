<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classes\PatientObject as Patient;
use App\Classes\Staff;
use App\Classes\ConsultationObject as Consultation;

class ConsultationObjectController2 extends Controller
{
    Public function getEditConsultation(Patient $patient, Staff $staff, Consultation $consultation) {
        return view('consultation.edit',['patient'=>$patient->getProfile(),'consult'=>$consultation->thisConsult(),'staff'=>$staff->getProfile()]);
    }

    Public function postEditConsultation(Patient $patient,Consultation $consultation,Request $r) {
      $c = $consultation->thisConsult();
      if($consultation->thisConsult()->update($r->all())) {
        return redirect()->route('consultation.view',[$c->patient->patient_id,$c->id]);
      } else {
        Request::flash('error','Consultation was not Updated');
        return redirect()->route('consultation.view',[$c->patient->patient_id, $c->id]);
      }
    }

    Public function getDeleteConsultation(Consultation $consultation) {
      $c = $consultation->thisConsult();
      if($consultation->thisConsult()->delete()) {
        return redirect()->route('patient.view',[$c->patient->patient_id]);
      } else {
        Request::flash('error', "Consultation not deleted");
        return redirect()->route('patient.view',[$c->patient->patient_id]);
      }
    }
}
