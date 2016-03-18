<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Request as Req;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Patient as PatientModel;
use Validator;
class Patients extends Controller
{

    Public function __construct() {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('patients_index',['all'=>PatientModel::all()]);
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
    public function postIndex(Request $request)
    {
        $rules= [
            'name'=> 'required',
            'phone'=>'required|digits:11'
        ];

        $v = Validator::make(['name'=>$request->name,'phone'=>$request->phone], $rules);

        if($v->fails()) {
            return redirect('/patients/create')
                    ->withErrors($v)
                    ->withInput();
                    
            
        }

        $newPatient = new PatientModel;

        $newPatient->name = $request->name;
        $newPatient->phone = $request->phone;
        $newPatient->patient_id = mt_rand(1000,9999);

        if($newPatient->save()) {
            return redirect('/patients/index')->with('report',"Patient has been Added to Db");
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
        $patient = PatientModel::find($id);
        $consultations = PatientModel::find($id)->consultations;

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
        return view('patients_edit',['patient'=>PatientModel::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request, $id)
    {
        $rules= [
            'name'=> 'required',
            'phone'=>'required|digits:11'
        ];

        $v = Validator::make(['name'=>$request->name,'phone'=>$request->phone], $rules);

        if($v->fails()) {
            return back()
                    ->withErrors($v)
                    ->withInput();
                    
            
        }

        $patient = PatientModel::find($id);

        $patient->name = $request->name;
        $patient->phone = $request->phone;

        if($patient->save()) {
            return redirect('/patients/index')->with('report',"Patient Info Updated");
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
        $patient = PatientModel::find($id);

        if($patient->delete()) {
            return back()->with('report','Patient Deleted Successfully');
        } else {
            return back()->with('report','Patient Delete Failed');
        }
    }
}
