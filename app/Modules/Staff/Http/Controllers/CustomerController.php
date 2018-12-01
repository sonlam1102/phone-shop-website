<?php

namespace App\Modules\Staff\Http\Controllers;

use App\Model\Customer;
use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class CustomerController extends StaffController
{
    public function index() {
        $customers = User::getAllCustomer();

        $data = $this->getUserInfo();

        return view('staff::customer/customer')
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
