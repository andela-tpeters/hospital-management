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
      // return dd($account->saveAccount($patient));
      $faker = \Faker\Factory::create();
      $data = ['amount'=>$faker->numberBetween($min = 1000, $max = 9000),'purpose'=>$faker->word];

      // return $patient->getProfile()->accounts()->save(\App\AccountModel::create($data));K9
      return dd($account->saveAccount($data));
      return view('patients_show',['patient'=>$patient->getProfile(),'patientConsults'=>$patient->myConsultations()->take(5)]);
    }

}
