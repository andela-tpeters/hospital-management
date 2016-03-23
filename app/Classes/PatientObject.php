<?php
  namespace App\Classes;


  /**
  * Builds the Patient 
  */
  class PatientObject implements \App\Interfaces\ProfileInterface
  {
    
    Public $patient;
    static public $person;

    function __construct($patient)
    {
      static::$person = $this->patient = $patient;
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

    public function saveConsults() {
      return $this->patient->consultations();
    }


  }