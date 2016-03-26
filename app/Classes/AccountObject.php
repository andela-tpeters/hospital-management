<?php namespace App\Classes;
use App\AccountModel as Account;
use App\Classes\PatientObject as Patient;
use Faker\Factory;
  /**
   * summary
   */
  class AccountObject
  {
      Public $patientAccount;
      Public $patient;
      /**
       * summary
       */
      public function __construct($account,$patient)
      {
          $this->patientAccount = $account;
          $this->patient = $patient;
      }

      Public function getAccounts() {
        return $this->patient->accounts()->orderBy('created_at','desc')->get();
      }

      Public function saveAccount(array $data) {
        return $this->patient->accounts()->save(Account::create($data));
      }
  }