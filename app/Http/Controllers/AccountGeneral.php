<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\NewAccountRequest as NAR;
use App\Http\Controllers\Controller;
use App\Classes\PatientObject as Patient;
use App\Classes\AccountObject as Account;

class AccountGeneral extends Controller
{
    Public function getCreate(Patient $patient) {
      return view('accounts.new',['patient'=>$patient->getProfile()]);
    }

    Public function postSave(Patient $patient,NAR $request,Account $account) {
      if($account->saveAccount($request->all())) {
        return redirect()->route('patient.view',[
              'patient'=>$patient->getProfile(),
              'patientConsults'=>$patient->myConsultations()->take(5),
              'accounts'=>$account->getAccounts()->take(5)
              ]);
      } else {
        Request::session()->flash('error','Account not saved');
        return back();
      }
    }
}
