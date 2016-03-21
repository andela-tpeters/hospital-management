@extends('layouts.app')

@section('content')

	<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Consultations

                <div class="pull-right col-xs-2 col-sm-2 col-md-2 col-lg-2">
                       <a href="{{ url('/consultations/create') }}">Add</a>
                </div>
                </div>

                <div class="panel-body">
                
                    @if(!empty($all))
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Hospital Id</th>
                                <th>Name</th>
                                <th>View</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                            @foreach($all as $one)
                            <tr>
                                <td>{{$one->patient_id}}</td>
                                <td>{{$one->name}}</td>
                                <td><a href="{{ url('/consultations').'/'.$one->id }}" title="Show Patient" class="btn btn-primary">Show</a></td>
                                <td><a href="{{ url('/consultations').'/'.$one->id.'/edit' }}" title="Edit Patient" class="btn btn-info">Edit</a></td>
                                <td><a href="{{ url('/consultations/destroy').'/'.$one->id }}" title="Delete Patient" class="btn btn-danger">Delete</a></td>
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