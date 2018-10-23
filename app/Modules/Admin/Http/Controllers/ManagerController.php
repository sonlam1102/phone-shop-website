<?php

namespace App\Modules\Admin\Http\Controllers;

use App\User;

class ManagerController extends AdminController
{
    public function index() {
        $managers = User::getManager();

        return view('admin::manager/manager')
            ->with('data', $this->getUserInfo())
            ->with('manager', $managers);
    }

    public function reset($id) {
        $manager = User::find($id);

        $manager->resetPassword();

        return redirect()->back();
    }
}
