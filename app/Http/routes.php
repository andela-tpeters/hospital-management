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

  Route::get('/consultations', ['uses'=>'ConsultationController@index','as'=>'consultation.index']);
});

Route::group(['middleware'=>['web','checkRole','auth'],'prefix'=>'patient'], function() {
  Route::post('/create-patient',['uses'=>'PatientInsertionController@createPatient','as'=>'patient.register']);
  Route::get('/show-patient/{patient_id}',['uses'=>'PatientRUDController@getShowPatient','as'=>'patient.view']);
  Route::get('/edit-patient',['uses'=>'PatientRUDController2@getEdit','as'=>'patient.edit']);
  Route::post('/update-patient',['uses'=>'PatientRUDController2@postUpdatePatient','as'=>'patient.update']);
  Route::get('/delete-patient',['uses'=>'PatientRUDController2@getDelete','as'=>'patient.delete']);
});

Route::group(['middleware'=>['web','checkRole','auth'],'prefix'=>'consultation'], function(){
  Route::get('/create', ['uses'=>'PatientRUDController2@getCreateConsultation','as'=>'consultation.create']);
  Route::post('/store', ['uses'=>'PatientRUDController2@postCreateConsultation','as'=>'consultation.store']);
  Route::get('/view/{patient_id}/{consultation_id}', ['uses'=>'ConsultationObjectController@getViewConsultation','as'=>'consultation.view']);
  Route::get('/edit',['uses'=>'ConsultationObjectController2@getEditConsultation','as'=>'consultation.edit']);
  Route::put('/update',['uses'=>'ConsultationObjectController2@postEditConsultation','as'=>'consultation.update']);
  Route::get('/delete/{patient_id?}/{consultation_id?}',['uses'=>'ConsultationObjectController2@getDeleteConsultation','as'=>'consultation.destroy']);
});

Route::group(['middleware'=>['web','auth'],'prefix'=>'patient/account'], function() {
  Route::get('/create',['uses'=>'AccountGeneral@getCreate','as'=>'account.create']);
  Route::post('/save',['uses'=>'AccountGeneral@postSave','as'=>'account.save']);
});


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

});



