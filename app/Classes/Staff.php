<?php
namespace App\Classes;
// use App\Interfaces;
use App\Classes\PatientObject as Patient;

/**
* Builds the Staff using the app
*/
class Staff implements \App\Interfaces\ProfileInterface
{
  use \App\Traits\PersonelTraits;

  public $staff;
  static public $role;
  static public $user;
  static public $staff_id;

  
  public function __construct($user)
  {
    static::$user = $this->staff = $user;
    static::$role = $this->staff->role;
    static::$staff_id = $this->staff->staff_id;
  }

  Public function getProfile() {
    return $this->staff;
  }

  


}