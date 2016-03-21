<?php namespace App\Traits;
// use App\Classes\PatientObject as Patient;
/**
 * summary
 */
trait PatientTraits
{
    public function myConsultations()
    {
        return $this->patient->consultations;
    }

}