<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function getAdminInfo () {
        try {
            $userinfo = \Auth::user()->userinfo ? \Auth::user()->userinfo : null;
        }
        catch (\Exception $e){
            $userinfo = null;
        }
        return $userinfo;
    }

    public function index() {

        return view('admin::main/main')->with('data', $this->getAdminInfo());
    }
}
