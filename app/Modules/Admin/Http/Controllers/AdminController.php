<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;

class AdminController extends HomeController
{
    public function index() {

        return view('admin::main/main')->with('data', $this->getUserInfo());
    }
}
