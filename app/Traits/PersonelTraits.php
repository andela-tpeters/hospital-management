<?php
  namespace App\Traits;

  use App\ConsultationModel as CM;
  use App\Patient as P;
  use App\DoctorsModel as DM;
  /**
   * All the personel in the hospital have the following traits
   */
  trait PersonelTraits
  {
      Public function PatientModel() {
        return new P;
      }

      Public function consults() {
        return new CM;
      }

      Public function getAllConsultations() 
      {
        return \DB::table('consultation')->join('patients','patients.patient_id','=','consultation.patient_id')->get();
      }
  }