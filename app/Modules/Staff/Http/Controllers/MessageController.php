<?php

namespace App\Modules\Staff\Http\Controllers;

use App\Model\CustomerChannel;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Tools\PusherApp;

class MessageController extends StaffController
{
    public function index() {
        $channel = CustomerChannel::all();
        $data = $this->getUserInfo();

        return view('staff::message/message')
            ->with('data', $data)
            ->with('channel', $channel);
    }

    public function push(Request $request) {
        $message = $request->post('message');
        $channel = $request->post('channel');

        $user = \Auth::user();

        $pusher = new PusherApp($channel);

        $data = [
            'message'=> $message,
            'user' => $user->fullname()
        ];

        $pusher->push($data);
    }
}
