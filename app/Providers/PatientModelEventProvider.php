<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Patient;
use Request;
class PatientModelEventProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Patient::creating(function($patient) {
            $patient->patient_id = mt_rand(1000,9999);
        });

        Patient::saved(function($patient) {
            Request::session()->flash('report',"Patient has been saved to Database");
        });

        Patient::deleted(function($patient) {
            Request::session()->flash('report','Patient deleted Succesfully');
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
