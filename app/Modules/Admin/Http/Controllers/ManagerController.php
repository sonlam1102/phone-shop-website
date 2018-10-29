<?php

namespace App\Modules\Admin\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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

    public function add(Request $request) {
        $email = $request->post('email');
        $name = $request->post('name');

        $data = [
            'name' => $name,
            'email' => $email,
        ];

        User::addManager($data);
        return redirect()->back();
    }
}
