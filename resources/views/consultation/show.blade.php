@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
	<?php  $patient = \App\Patient::find($patientConsults->patient_id); ?>
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
				<!-- Default panel contents -->
				<div class="panel-heading"><h4> Consultation by Doctor: {{$staff->title.' '.$staff->name}} </h4>	</div>
				<div class="panel-body">
					
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div>Consultation: <br>Date: {{ strftime("%dth, %b %Y",strtotime($patientConsults->created_at)) }}</div>
							<div>
								Time: {{ strftime("%H:%M",strtotime($patientConsults->created_at)) }}
							</div>
						</div>
						
					</div>
					
					
					
					
				</div>
				
				<!-- Table -->
				<table class="table">
					
					<tbody>
						<tr>
							<td colspan="" rowspan="" headers="">Diagnosis</td>
							<td colspan="" rowspan="" headers="">{{$patientConsults->diagnosis}}</td>
						</tr>
						<tr>
							<td colspan="" rowspan="" headers="">Treatment</td>
							<td colspan="" rowspan="" headers="">{{$patientConsults->treatment}}</td>
						</tr>
						<tr>
							<td colspan="" rowspan="" headers="">Prescriptions</td>
							<td colspan="" rowspan="" headers="">{{$patientConsults->prescriptions}}</td>
						</tr>
						<tr>
							<td colspan="" rowspan="" headers="">Lab Tests</td>
							<td colspan="" rowspan="" headers="">
							@if($patientConsults->lab_tests == 1)
								{{'Yes'}}
							@else 
								{{'No'}}
							@endif

							</td>
						</tr>
						<tr>
							<td>
								<a class="btn btn-primary" href="{{ route('consultation.edit') }}">Edit</a>
							</td>
							<td>
								<a class="btn btn-danger" href="{{ route('consultation.destroy') }}">Delete</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection