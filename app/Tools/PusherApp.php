<?php
/**
 * Created by PhpStorm.
 * User: sonlam1102
 * Date: 2018-12-07
 * Time: 20:27
 */

namespace App\Tools;
use Pusher\Pusher;

class PusherApp
{
    private $channel;
    private $pusher;

    public function __construct($channel)
    {
        $this->channel = $channel;

        $this->pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'encrypted' => true
            ]
        );
    }

    public function push($data) {

        $this->pusher->trigger('UserMessageBroadcasting', $this->channel, $data);
    }
}