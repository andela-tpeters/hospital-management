<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classes\PatientObject as Patient;
use App\Http\Requests\CreatePatientRequest as CPR;
use App\Http\Requests\ConsultationStorageValidation as CSV;
use App\Classes\Staff;

class PatientRUDController2 extends Controller
{
    public function getEdit(Patient $patient)
    {
        return view('patients_edit',['patient'=>$patient->getProfile()]);
    }

    Public function postUpdatePatient(Patient $patient,CPR $request) {
      if($patient->update($request->all())) {
        return redirect()->route('patient.view',['patient_id'=>$patient->getProfile()->patient_id]);
      } else {
        $request->session()->flash('error','Patient Info not Updated');
        return back();
      }
    }


    Public function getDelete(Patient $patient) {
      if($patient->getProfile()->delete()) {
        return redirect()->route('patient.all');
      } else {
        Request::flash('error', "Patient not Deleted");
        return back();
      }
    }

    Public function postCreateConsultation(Patient $patient, Staff $staff, CSV $r) {
      $patient->saveConsults()->save($staff->consults()->create($r->all()));
      return redirect()->route('patient.view',['patient_id'=>$patient->getProfile()->patient_id]);
    }

    Public function getCreateConsultation(Patient $patient) {
      return view('consultation.create',['patient'=>$patient->getProfile()]);
    }

    Public function getViewConsultation(Patient $patient, $id) {
      return view('consultation.show',['patientConsults'=>$patient->getConsultation($id)]);
    }

    Public function getEditConsultation(Patient $patient, Staff $staff, $id) {
        return view('consultation.edit',['patient'=>$patient->getProfile(),'consult'=>$patient->getConsultation($id),'staff'=>$staff->getProfile()]);
    }

    Public function postEditConsultation(Patient $patient,$id,Request $r) {
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
