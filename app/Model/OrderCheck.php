<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

//Nhan vien xac nhan don hang
class OrderCheck extends Model
{
    protected $table = "order_check";

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function order() {
        return $this->belongsTo('App\Model\Order', 'order_id');
    }

    public static function addOrderCheck($user_id, $order_id) {
        $order_check = new OrderCheck();

        $order_check->user_id = $user_id;
        $order_check->order_id = $order_id;

        return $order_check->save();
    }
}
