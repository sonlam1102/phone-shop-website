<?php

namespace App\Modules\Customer\Http\Controllers;

use Illuminate\Http\Request;


class MessageController extends CustomerController
{
    public function index() {
        return view('customer::message.message');
    }
}
