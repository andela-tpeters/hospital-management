<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classes\Staff;
use App\Classes\PatientObject as Patient;
use Carbon\Carbon;
use App\Classes\AccountObject as Account;

class PatientRUDController extends Controller
{
    Public $staff;

    Public function __construct(Staff $staff, Request $r) {
      \Session::put('patient_id',$r->segment(3));
      $this->staff = $staff;
    }

    Public function getShowPatient(Patient $patient,Account $account) {
      return view('patients_show',[
              'patient'=>$patient->getProfile(),
              'patientConsults'=>$patient->myConsultations()->take(5),
              'accounts'=>$account->getAccounts()->take(5)
              ]);
    }

}
