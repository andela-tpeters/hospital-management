<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\AccountMOdel;
use App\Classes\Staff;
use App\Classes\PatientObject as Patient;

class AccountEventProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        AccountMOdel::creating(function($account) {
            $account->staff_id = Staff::$user->staff_id;
            $account->patient_id = Patient::$person->patient_id;
        });

        AccountModel::saved(function() {
            \Request::session()->flash('report',"Account Saved Successfully");
        });

        AccountModel::deleted(function() {
            \Request::session()->flash('report','Account deleted Successfully');
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
