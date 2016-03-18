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
      public function createPatient(array $patient)
      {
        // try to create an Event for this
          P::create($patient);
      }

      Public function PatientModel() {
        return new P;
      }

      Public function ConsultationModel($id,array $values) {
        P::find($id)->update($values);
      }

      Public function deletePatient($id) {
        P::find($id)->delete($values);
      }
  }