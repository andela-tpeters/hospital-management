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
      if($patient->updateConsultation($id,$r->all())) {
        return redirect()->route('patient.view',['patient_id'=>$patient->getProfile()->patient_id]);
      } else {
        Request::flash('error','Consultation was not Updated');
        return redirect()->route('patient.view',['patient_id'=>$patient->getProfile()->patient_id]);
      }
    }

    Public function getDeleteConsultation(Patient $patient, $id) {
      if($patient->getConsultation($id)->delete()) {
        return redirect()->route('patient.view',[$patient->getProfile()->patient_id]);
      } else {
        Request::flash('error', "Consultation not deleted");
        return redirect()->route('patient.view',[$patient->getProfile()->patient_id]);
      }
    }
}
