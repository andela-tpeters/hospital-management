<?php
  namespace App\Classes;


  /**
  * Builds the Patient 
  */
  class PatientObject implements \App\Interfaces\ProfileInterface
  {
    
    Public $patient;

    function __construct($patient)
    {
      $this->patient = $patient;
    }

    use \App\Traits\PatientTraits;

    Public function getProfile() {
      return $this->patient;
    }

    Public function update(array $data) {
      if($this->patient->update($data)) {
        return true;
      } else {
        return false;
      }
    }

  }