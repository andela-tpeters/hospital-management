<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\Classes\Staff;

class StaffProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Auth::check();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('\App\Classes\Staff',function(){
            return new Staff(Auth::user());
        });
    }
}
