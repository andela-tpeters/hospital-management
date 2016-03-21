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
    Public $consultation; // consutlation

    public function __construct(Consultation $consultation) {
        $this->consultation = $consultation;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */
    public function index()
    {
        return view('consultation.index',['all'=>$this->consultation->getAll()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return dd($this->consultation->getPatient());
        return view('consultation.create',['patient'=>$this->consultation->getPatient()]);
    }

   


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CSV $request)
    {
        PM::find($request->patient_id)->consultations()->save(CM::create($request->all()));
        
        return redirect('/patients/show/'.$request->patient_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patConsults = CM::find($id);
        return view('consultation.show',['patientConsults'=>$patConsults]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consultation = CM::find($id);
        $patient = CM::find($id)->patient;
        return view('consultation.edit',['patient'=>$patient,'consult'=>$consultation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CSV $r,$id)
    {
        
        CM::find($id)->update($r->all());
        return redirect()->route('patient.view',[$r->patient_id]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $r, $id)
    {
        if(!CM::find($id)->delete()) $r->session()->flash('report','Delete Failed');

        return back();
        
    }
}
