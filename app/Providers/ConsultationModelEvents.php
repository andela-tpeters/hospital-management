<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ConsultationModel as CM;
use Request;

class ConsultationModelEvents extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        CM::saving(function($consultation) 
        {
            if($consultation->isValid) {
                Request::session()->flash('error','Database action Failed');
                return false;
            }
            Request::session()->flash('report','Saving Consultation');
            return true;
        });

        CM::saved(function($consultation) 
        {
            Request::session()->flash('report','Consultation Saved Successfully');
        });

        CM::deleted(function($consultation) 
        {
            Request::session()->flash('report','Delete Successful');
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
