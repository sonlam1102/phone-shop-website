<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerChannel extends Model
{
    protected $table = "customer_channel";

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public static function make_channel($user) {
        $channel = new CustomerChannel();

        $channel->user_id = $user;
        $channel->name = "channel-user-".$user;

        return $channel->save();
    }
}
