<?php

namespace App\Modules\Staff\Http\Controllers;

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class StaffController extends HomeController
{
    public function index() {

        return view('staff::main/main')->with('data', $this->getUserInfo());
    }

    public function getStaffInfo() {
        return \Auth::user()->staff_info;
    }
}
