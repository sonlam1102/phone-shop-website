<?php

namespace App\Modules\Manager\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CustomerController extends ManagerController
{
    public function index() {
        $customers = User::getAllCustomer();

        $data = $this->getUserInfo();

        return view('manager::customer/customer')
            ->with('data', $data)
            ->with('customer', $customers);
    }

    public function change(Request $request, $id) {
        $user = User::find($id);
        $type = $request->post('type', 0);

        if (!$user->customer) {
            Customer::addCustomer($id, $type);
        } else {
            $user->customer->updateKind($type);
        }

        return redirect()->back();
    }
}
