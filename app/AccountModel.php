<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountModel extends Model
{
    protected $table = 'account';

    protected $primaryKey = 'patient_id';

    Protected $fillable = ['amount','purpose'];
}
