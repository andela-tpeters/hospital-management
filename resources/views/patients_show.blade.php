@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">Patients Info</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h2>
							{{$patient->name}}
							</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div>Last Visit: <br>Date: {{ strftime("%dth, %B %Y",strtotime($patient->updated_at)) }}</div>
							<div>
								Time: {{ strftime("%H:%M",strtotime($patient->updated_at)) }}
							</div>
						</div>
						
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: center">
							<div style="background-color: rgba(0,0,0,0.2); color: white; height: 150px; width: 50%">
								<p>
									Photo Graph
								</p>
							</div>
							
						</div>
					</div>
					
					
					
				</div>
				
				<!-- Table -->
				<table class="table">
					
					<tbody>
						<tr>
							<td>Hospital Id</td>
							<td>{{$patient->patient_id}}</td>
						</tr>
						<tr>
							<td>Name</td>
							<td> {{$patient->name}} </td>
						</tr>
						<tr>
							<td>Phone</td>
							<td> {{$patient->phone}} </td>
						</tr>
						<tr>
							<td>Registration Date</td>
							<td> {{strftime("%dth,%B %Y, Time: %H:%M",strtotime($patient->created_at))}} </td>
						</tr>
						<tr>
							<td><a href="{{ route('patient.edit') }}" title="Edit Patient" class="btn btn-info">Edit</a></td>
							<td><a href="{{ route('patient.delete') }}" title="Delete Patient" class="btn btn-danger">Delete</a></td>
						</tr>
					</tbody>
				</table>
				
			</div>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<h4>
							Consultations History
							</h4>
						</div>
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 pull-right">
							<form action="{{ route('consultations.create') }}" method="GET">
								<input type="hidden" name="_method" value="HEAD">
								<input type="hidden" name="patient" value="{{$patient->patient_id}}">
								<div class="form-group">
									<div class="">
										<button type="submit" class="btn btn-primary">
										<i class="fa fa-btn fa-pencil"></i></button>
									</div>
								</div>
							</form>
							
							{{-- <a href="{{url('/consultations/create').'/'.$patient->patient_id}}" class="btn btn-info"  title="">Add</a> --}}
						</div>
					</div>
					
					
				</div>
				
				<!-- Table -->
				@if(count($patientConsults) > 0)
				<table class="table">
					<thead>
						<tr>
							<th>Date</th>
							<th>Diagnosis</th>
							<th>View</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						@foreach($patientConsults as $consult)
						<tr>
							
							<td colspan="" rowspan="" headers=""> {{strftime('%B, %d %Y',strtotime($consult->created_at))}} </td>
							<td colspan="" rowspan="" headers="">{{$consult->diagnosis}}</td>
							<td colspan="" rowspan="" headers="">
								<a href="{{url('/consultations').'/'.$consult->id}}" title="">View</a>
							</td>
							
							<td colspan="" rowspan="" headers="">
								<a href="{{url('/consultations').'/'.$consult->id.'/edit'}}" title="">Edit</a>
							</td>
							<td colspan="" rowspan="" headers="">
								<form action="{{ url('/consultations').'/'.$consult->id }}" method="post">
									{!! csrf_field() !!}
									<input type="hidden" name="_method" value="DELETE">
									<div class="form-group">
										<div class="">
											<button type="submit" class="btn btn-danger">
											<i class="fa fa-btn fa-trash"></i></button>
										</div>
									</div>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				@else
				<h3 style="text-align: center"> OOPS!!! No Record Found </h3>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection