<?php namespace App\Classes;
use App\AccountModel as Account;
use App\Classes\PatientObject as Patient;

  /**
   * summary
   */
  class AccountObject
  {
      Public $patientAccount;
      // Static $patient;
      /**
       * summary
       */
      public function __construct(Account $patient)
      {
          $this->patientAccount = $patient;
      }

      Public function getAccounts() {
        return $this->patientAccount;
      }

      Public function saveAccount(array $data) {
        return $this->patientAccount
      }
  }