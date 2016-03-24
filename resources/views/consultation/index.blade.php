@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Consultations</div>
                <div class="panel-body">
                    
                    @if(!empty($all))
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Hospital Id</th>
                                <th>Name</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($all as $one)
                            <tr>
                                <td>{{$one->patient_id}}</td>
                                <td>{{$one->patient->name}}</td>
                                <td><a href="{{ route('consultation.view',[$one->patient_id,$one->id]) }}" title="Show Consultation" class="btn btn-primary">View</a></td>
                                <td><a href="{{ route('consultation.destroy',[$one->patient_id,$one->id]) }}" title="Delete Consultation" class="btn btn-danger">Delete</a></td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    @else
                    {{"There no consultations yet."}}
                    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection