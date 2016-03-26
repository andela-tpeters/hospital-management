<?php namespace App\Classes;
use App\AccountModel as Account;
use App\Classes\PatientObject as Patient;

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
      public function __construct(Account $account, Patient $patient)
      {
          $this->patientAccount = $account;
          $this->patient = $patient;
      }

      Public function getAccounts() {
        return $this->patientAccount;
      }

      Public function saveAccount(array $data) {
        return $this->patient->getProfile()->save(App\AccountModel::create($data));
      }
  }