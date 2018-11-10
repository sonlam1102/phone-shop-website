<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public const PENDING = 1;
    public const CONFIRM = 2;
    public const SHIPPING = 3;
    public const SUCCESS = 3;
    public const CANCEL = 5;

    public const CASH = 1;
    public const TRANSFER = 2;

    protected $order_status = [
        1 => "Đang chờ",
        2 => "Xác nhận",
        3 => "Giao hàng",
        4 => "Thành công",
        5 => "Huỷ"
    ];

    protected $methods = [
        1 => "Tiền mặt",
        2 => "Chuyển khoản"
    ];

    protected $table = 'order';

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function city() {
        return $this->belongsTo('App\Model\City', 'city_id');
    }

    public function cart() {
        return $this->hasOne('App\Model\Cart', 'order_id');
    }

    public static function add_order($data) {
        $order = new Order();

        $order->name = $data['name'];
        $order->address = $data['address'];
        $order->phone = $data['phone'];
        $order->city_id = $data['city'];
        $order->user_id = $data['user'];
        $order->total_price = $data['total_price'];
        $order->cart_id = $data['cart'];
        $order->method = self::CASH;
        $order->status = self::PENDING;

        $order->save();
        return $order->id;
    }

    public function status() {
        return $this->order_status[$this->status];
    }

    public function method() {
        return $this->methods[$this->method];
    }
}
