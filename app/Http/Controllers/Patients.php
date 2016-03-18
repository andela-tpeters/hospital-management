<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePatientRequest as CPR;
use App\Classes\Staff;

class Patients extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postIndex(CPR $request)
    {

        $newPatient = $this->staff->PatientModel();

        $newPatient->name = $request->name;
        $newPatient->phone = $request->phone;

        if($newPatient->save()) {
            return redirect('/patients/index');
        } else {
            return back()->with('report','Patient was not added to the database');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShow($id)
    {
        $patient = $this->staff->PatientModel()->find($id);
        $consultations = $patient->consultations;

        return view('patients_show',['patient'=>$patient,'patientConsults'=>$consultations]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit(Request $r, $id)
    {
        return view('patients_edit',['patient'=>$this->staff->PatientModel()->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(CPR $request, $id)
    {
        

        $patient = $this->staff->PatientModel()->find($id);

        $patient->name = $request->name;
        $patient->phone = $request->phone;

        if($patient->save()) {
            return redirect('/patients/index');
        } else {
            return back()->with('report',"Patient Info Not Updated")->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDestroy(Request $r, $id)
    {
        $patient = $this->staff->PatientModel()->find($id);

        if($patient->delete()) {
            return back();
        } else {
            return back()->with('report','Patient Delete Failed');
        }
    }
}
