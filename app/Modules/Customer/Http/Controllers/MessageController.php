<?php

namespace App\Modules\Customer\Http\Controllers;

use App\Model\ChannelMessage;
use App\Model\CustomerChannel;
use App\Tools\PusherApp;
use Illuminate\Http\Request;


class MessageController extends CustomerController
{
    public function index() {
        $user = \Auth::user();
        $messages = null;

        if (!$user->customer_channel) {
            $user_channel = CustomerChannel::make_channel($user->id);
        }
        else {
            $user_channel = $user->customer_channel;
        }

        $channel = $user_channel->channel;

        if ($messages)
            return view('customer::message.message')
                ->with('message', $messages->messages)
                ->with('channel', $channel);

        return view('customer::message.message')->with('channel', $channel);
    }

    public function push(Request $request) {
        $message = $request->post('message');

        $user = \Auth::user();
        if (!$user->customer_channel) {
            CustomerChannel::make_channel($user->id);
        }

//        ChannelMessage::make_message($user->customer_channel->id, $message, $user->id);

        $pusher = new PusherApp($user->customer_channel->channel);

        $data = [
            'message'=> $message,
            'user' => $user->fullname()
        ];

        $pusher->push($data);
    }
}
