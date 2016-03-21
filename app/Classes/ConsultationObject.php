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
  public $staff;
  public $patient;
  public $all;
  
  function __construct(Staff $staff, Patient $patient)
  {
    $this->staff = $staff;
    $this->patient = $patient;
  }


  Public function getPatient() {
    return $this->patient;
  }


  
}