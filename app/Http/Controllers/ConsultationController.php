<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ConsultationStorageValidation as CSV;
use App\Http\Controllers\Controller;
use App\ConsultationModel as CM;
use App\Patient as PM;
use App\Events\NewConsulationBroadCast;
use App\Classes\ConsultationObject as Consultation;


class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */
    public function index()
    {
        return view('consultation.index',['all'=>\DB::table('consultation')->join('patients','patients.patient_id','=','consultation.patient_id')->get()]);
    }
    
}
