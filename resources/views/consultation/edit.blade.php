@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Edit Consultation for {{$patient->name}}</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('consultations.update',[$consult->id]) }}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="patient_id" value="{{$patient->patient_id}}">
                        <input type="hidden" name="doctor_id" value="{{\Auth::user()->staff_id}}">
                        <input type="hidden" name="_method" value="PUT">
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Diagnosis</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="diagnosis" value="{{$consult->diagnosis}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Treatment</label>
                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="treatment" >{{$consult->treatment}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Prescriptions</label>
                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="prescriptions" >{{$consult->prescriptions }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"><p>Lab Tests?</p> </label>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <p><input type="radio" name="lab_tests" value="1" 
                                    {{$consult->lab_tests == 1 ? 'checked': ''}}
                                > Yes</p>
                                <p><input type="radio" name="lab_tests" value="0" {{$consult->lab_tests == 0 ? 'checked': ''}}> No</p>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i>Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection