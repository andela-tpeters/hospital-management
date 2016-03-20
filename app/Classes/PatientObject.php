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

    Public function getProfile() {
      return $this->patient->toArray();
    }


  }