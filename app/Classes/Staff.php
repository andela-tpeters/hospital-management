<?php
namespace App\Classes;
// use App\Interfaces;

/**
* Builds the Staff using the app
*/
class Staff implements \App\Interfaces\ProfileInterface
{
  use \App\Traits\PersonelTraits;

  protected $staff;
  
  public function __construct($user)
  {
    $this->staff = $user;
  }

  Public function getProfile() {
    return $this->staff->role;
  }

  
}