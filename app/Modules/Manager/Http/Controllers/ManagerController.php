<?php

namespace App\Modules\Manager\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;

class ManagerController extends HomeController
{
    public function index() {
        $company = \Auth::user()->manager->company;
        return view('manager::main/main')
            ->with('company', $company)
            ->with('data', $this->getUserInfo());
    }

    public function getCompany() {
        return \Auth::user()->company;
    }
}
