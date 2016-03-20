<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web','auth']], function () {
	Route::controller('/patients','Patients',
		[
			'getIndex'=>'patient.all',
			'getCreate'=>'patient.create',
			// 'getShow'=>'patient.view',
			'getEdit'=>'patient.edit',
			'postUpdate'=>'patient.update',
			'getDestroy'=>'patient.delete'
		]);
	Route::resource('/consultations', 'ConsultationController');
  Route::post('/create-patient','PatientInsertionController@createPatient',['as'=>'patient.register']);
  Route::get('/show-patient/{patient_id}','PatientRUDController@showPatient',['as'=>'patient.veiw']);
});



Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

});



