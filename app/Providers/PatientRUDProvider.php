<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\PatientObject;
use App\Patient;
use Illuminate\Http\Request;


class PatientRUDProvider extends ServiceProvider
{
    Public $patient;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind("App\Classes\PatientObject",function() {
            return new PatientObject(Patient::find(session('patient_id')));
        });
    }

}
