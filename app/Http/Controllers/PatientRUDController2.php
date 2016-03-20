<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classes\PatientObject as Patient;
use App\Http\Requests\CreatePatientRequest as CPR;

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
}
