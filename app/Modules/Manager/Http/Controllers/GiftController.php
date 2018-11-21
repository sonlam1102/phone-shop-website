<?php

namespace App\Modules\Manager\Http\Controllers;

use Illuminate\Http\Request;


class GiftController extends ManagerController
{
    public function index() {
        $gifts = \Auth::user()->manager->company->gifts;
        $data = $this->getUserInfo();

        return view('manager::order/order')
            ->with('data', $data)
            ->with('gift', $gifts);
    }
}
