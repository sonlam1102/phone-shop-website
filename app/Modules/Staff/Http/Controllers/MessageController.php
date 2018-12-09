<?php

namespace App\Modules\Staff\Http\Controllers;

use App\Model\ChannelMessage;
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

    public function get_messages($id) {
        $channel = CustomerChannel::find($id);

        $data = [];

        foreach ($channel->messages as $item) {
            $temp = [
                'user' => $item->user->fullname(),
                'message' => $item->message
            ];

            array_push($data, $temp);
        }

        return json_encode($data);
    }

    public function push(Request $request) {
        $message = $request->post('message');
        $channel = $request->post('channel');
        $channel_id = $request->post('channel_id');

        $user = \Auth::user();

        ChannelMessage::make_message($channel_id, $message, $user->id);

        $pusher = new PusherApp($channel);

        $data = [
            'message'=> $message,
            'user' => $user->fullname()
        ];

        $pusher->push($data);
    }
}
