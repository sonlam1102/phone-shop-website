<?php

namespace App\Modules\Manager\Http\Controllers;

use App\Model\Staff;
use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class StaffController extends ManagerController
{
    public function index() {
        $staff = \Auth::user()->company->staffs;

        return view('manager::staff/staff')
            ->with('data', $this->getUserInfo())
            ->with('staff', $staff);
    }

    public function add(Request $request) {
        $email = $request->post('email');
        $name = $request->post('name');

        $data = [
            'name' => $name,
            'email' => $email,
        ];

        $user = User::addStaff($data);
        if ($user) {
            Staff::addStaff($user->id, \Auth::user()->company->id);
        }

        return redirect()->back();
    }

    public function reset($id) {
        $staff = User::find($id);

        $staff->resetPassword();

        return redirect()->back();
    }
}
