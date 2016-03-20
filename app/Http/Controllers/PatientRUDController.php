<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classes\Staff;
use App\Classes\PatientObject as Patient;

class PatientRUDController extends Controller
{
    Public $patient;
    Public $staff;

    Public function __construct(Staff $staff, Request $r) {
      \Config::set('patient_id', $r->segment(2));
      $this->staff = $staff;
    }

    Public function showPatient(Patient $patient) {
      return dd($patient->getProfile());
    }
}
