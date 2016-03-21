<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePatientRequest as CPR;
use App\Classes\Staff;
// use Faker\Factory;
class PatientPageController extends Controller
{
    Public $staff;
    Public function __construct(Staff $staff) {
        $this->staff = $staff;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('patients_index',['all'=>$this->staff->PatientModel()->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
         return view('patients_new')->with('report',"this is report");
    }

    

    

    
    // public function getDestroy(Request $r, $id)
    // {
    //     $patient = $this->staff->PatientModel()->find($id);

    //     if($patient->delete()) {
    //         return back();
    //     } else {
    //         return back()->with('report','Patient Delete Failed');
    //     }
    // }
}
