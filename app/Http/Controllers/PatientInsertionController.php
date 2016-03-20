<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreatePatientRequest as CPR;
use App\Http\Controllers\Controller;
use App\Classes\Staff;

use Faker\Factory;

class PatientInsertionController extends Controller
{
    Public $staff;
    Public $patient;
    Public $fake;
    Public function __construct(Staff $staff, CPR $patient) {
        $this->staff = $staff;
        $this->patient = $patient;
        $this->fake = Factory::create();
    }

    Public function createPatient() {

      $data = ['name'=>$this->patient->name,'phone'=>$this->patient->phone];

      if($this->staff->PatientModel()->create($data)) {
        return redirect()->route('patient.all');
      } else {
        $this->patient->session()->flash('error','Patient Not Saved');
        return back();
      };

      
    }
}
