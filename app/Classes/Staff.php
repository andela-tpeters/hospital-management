<?php
namespace App\Classes;
// use App\Interfaces;

/**
* Builds the Staff using the app
*/
class Staff implements \App\Interfaces\ProfileInterface
{
  use \App\Traits\PersonelTraits;

  public $staff;
  static public $role;
  static public $user;
  
  public function __construct($user)
  {
    static::$user = $this->staff = $user;
    static::$role = $this->staff->role;
    // static::$user = $user;
  }

  Public function getProfile() {
    return static::$role;
  }

  // static public function m() {
  //   return static::$user;
  // }

  
}