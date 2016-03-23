<?php namespace App\Classes;

use App\Classes\PatientObject as Patient;
use App\Classes\Staff;

/**
* constructing the staff and the patient for the ConsultationObject
* @param App\Classes\Staff
* @param App\Classes\PatientObject
*
*/
class ConsultationObject
{
  public $consultation;
  
  function __construct($consultation)
  {
    $this->consultation = $consultation;
  }


  Public function getPatient() {
    // return $this->patient;
  }

  Public function thisConsult() {
    return $this->consultation;
  }

  
}