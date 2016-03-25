<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountModel extends Model
{
    protected $table = 'account';

    protected $primaryKey = 'patient_id';

    Protected $fillable = ['amount','purpose'];

    Public function patient() {
      return $this->belongsTo('\App\Patient','patient_id','patient_id');
    }
}
