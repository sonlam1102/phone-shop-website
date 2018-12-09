<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ChannelMessage extends Model
{
    protected $table = "message_channel";

    public function channel() {
        return $this->belongsTo('App\Model\CustomerChannel', 'customer_channel_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public static function make_message($channel, $message, $user) {
        $message_channel = new ChannelMessage();

        $message_channel->message = $message;
        $message_channel->customer_channel_id = $channel;
        $message_channel->user_id = $user;
        $message_channel->save();

        return $message_channel;
    }

    public static function findChannelID($channel) {
        return self::select('id')->where('channel', '=', $channel) ? self::select('id')->where('channel', '=', $channel)->first() : null;
    }
}
