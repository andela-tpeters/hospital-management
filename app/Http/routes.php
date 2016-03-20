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
	Route::controller('/patients','PatientPageController',
		[
			'getIndex'=>'patient.all',
			'getCreate'=>'patient.create'
		]);
	Route::resource('/consultations', 'ConsultationController');
  
});

Route::group(['middleware'=>['web'/*,'checkRole'*/,'auth'],'prefix'=>'patient'], function() {
  Route::post('/create-patient',['uses'=>'PatientInsertionController@createPatient','as'=>'patient.register']);
  Route::get('/show-patient/{patient_id}',['uses'=>'PatientRUDController@getShowPatient','as'=>'patient.view']);
  Route::get('/edit-patient',['uses'=>'PatientRUDController2@getEdit','as'=>'patient.edit']);
  Route::post('/update-patient',['uses'=>'PatientRUDController2@postUpdatePatient','as'=>'patient.update']);
  Route::get('/delete-patient',['uses'=>'PatientRUDController2@getDelete','as'=>'patient.delete']);
});


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

});



