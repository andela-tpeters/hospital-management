<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\AccountObject as Account;
use App\AccountModel;

class AccountProvider extends ServiceProvider
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
        $this->app->bind('\App\Classes\AccountObject',function() {
            return new Account(AccountModel::find(session('patient_id')));
        });
    }
}
