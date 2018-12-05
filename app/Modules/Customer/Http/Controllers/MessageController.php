<?php

namespace App\Modules\Customer\Http\Controllers;

use App\Events\UserMessageBroadcasting;
use App\Model\ChannelMessage;
use App\Model\CustomerChannel;
use Illuminate\Http\Request;


class MessageController extends CustomerController
{
    public function index() {
        $user = \Auth::user();
        $messages = null;

        if (!$user->customer_channel) {
            CustomerChannel::make_channel($user->id);
        }
        else {
            $messages = \Auth::user()->customer_channel;
        }

        $channel = $user->customer_channel->channel;

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

        ChannelMessage::make_message($user->customer_channel->id, $message, $user->id);

        broadcast(new UserMessageBroadcasting($user->customer_channel->channel))->toOthers();

        $data = [];

        foreach ($user->customer_channel->messages as $item) {
            $temp = [
                'message'=> $item->message,
                'user' => $item->channel->user->fullname()
            ];

            array_push($data, $temp);
        }

        return json_encode($data);
    }
}
