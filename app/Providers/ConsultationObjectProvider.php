<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\ConsultationObject as Consultation;
use App\Classes\Staff;
use App\Classes\PatientObject as Patient;
use App\ConsultationModel;

class ConsultationObjectProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('\App\Classes\ConsultationObject',function() {
            return new Consultation(ConsultationModel::find(session('consultation_id')));
        });
    }
}
