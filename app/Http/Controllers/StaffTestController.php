<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classes\Staff;

class StaffTestController extends Controller
{
    public $staff;
    Public function __construct(Staff $staff) {
      $this->staff = $staff;
    }

    Public function getIndex() {
      dd($this->staff);
    }
}
