@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
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
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<div class="panel panel-info">
				<div class="panel-heading">
							<h4>Consultations History</h4>
				</div>

				<div class="panel-body">
					<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 pull-right">
							<a href="{{route('consultation.create')}}" class="btn btn-info pull-right"  title="">Add</a>
					</div>
				</div>
				
				<!-- Table -->
				@if(count($patientConsults) > 0)
				<table class="table">
					<thead>
						<tr>
							<th style="text-align: center">Date</th>
							<th style="text-align: center">Diagnosis</th>
							<th style="text-align: center">View</th>
							<th style="text-align: center">Edit</th>
							<th style="text-align: center">Delete</th>
						</tr>
					</thead>
					<tbody>
						@foreach($patientConsults as $consult)
						<tr>
							
							<td style="text-align: justify;"> {{strftime('%B, %d %Y',strtotime($consult->created_at))}} </td>
							<td style="text-align: justify;">{{$consult->diagnosis}}</td>
							<td style="text-align: center">
								<a href="{{ route('consultation.view',['patient_id'=>$consult->patient_id,'consultation_id'=>$consult->id]) }}" title="">View</a>
							</td>
							
							<td style="text-align: center">
								<a href="{{ route('consultation.edit',[$consult->id]) }}" title="">Edit</a>
							</td>
							<td style="text-align: center">
								<a href="{{ route('consultation.destroy',[$consult->patient_id,$consult->id]) }}" title=""><i class="fa fa-btn fa-trash"></i></a>
							</td>
						</tr>
						@endforeach
						<tr>
							<td colspan="5">
								<div class="pull-right col-xs-2 col-sm-2 col-md-2 col-lg-2">
									<a href="#" class="btn" style="text-align: center">See All</a>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				@else
				<h3 style="text-align: center"> OOPS!!! No Record Found </h3>
				@endif
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<div class="panel panel-danger">
				<!-- Default panel contents -->
				<div class="panel-heading"><h4>Accounts</h4></div>
				<div class="panel-body">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 pull-right">
						<a href="#" class="btn btn-danger pull-right">
							Add Account
						</a>
					</div>
				</div>
			
				<!-- Table -->
				@if(count($accounts) > 0)
				<table class="table">
					<thead>
						<tr>
							<th>Date</th>
							<th>Purpose</th>
							<th>Amount</th>
						</tr>
					</thead>
					<tbody>
					@foreach($accounts as $account)
						<tr>
							<td>{{$account->created_at}}</td>
							<td>{{$account->purpose}}</td>
							<td>{{$account->amount}}</td>
						</tr>
					@endforeach
					<tr>
						<td colspan="3">
							<div class="pull-right col-xs-2 col-sm-2 col-md-2 col-lg-2">
									<a href="#" class="btn" style="text-align: center">See All</a>
							</div>
						</td>
					</tr>
					</tbody>
				</table>
			@else
				<h3 style="text-align: center"> OOPS!!! No Account Record Found </h3>
			@endif
			</div>
		</div>
	</div>
</div>
@endsection