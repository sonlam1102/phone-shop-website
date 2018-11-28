<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

//Don hang
class Order extends Model
{
    public const PENDING = 1;
    public const CONFIRM = 2;
    public const SHIPPING = 4;
    public const SUCCESS = 3;
    public const CANCEL = 5;

    public const CASH = 1;
    public const TRANSFER = 2;

    protected $order_status = [
        self::PENDING => "Đang chờ",
        self::CONFIRM => "Đã Xác nhận",
        self::SHIPPING => "Giao hàng",
        self::SUCCESS => "Thành công",
        self::CANCEL => "Đã Huỷ"
    ];

    protected $methods = [
        self::CASH => "Tiền mặt",
        self::TRANSFER => "Chuyển khoản"
    ];

    protected $table = 'order';

    public function check() {
        return $this->hasOne('App\Model\OrderCheck', 'order_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function city() {
        return $this->belongsTo('App\Model\City', 'city_id');
    }

    public function cart() {
        return $this->belongsTo('App\Model\Cart', 'cart_id');
    }

    public function subscribed() {
        return $this->hasMany('App\Model\SubscribedProduct', 'order_id');
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
        $order->method = $data['method'];
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

    public function update_status($status) {
        $this->status = $status;

        return $this->save();
    }

    public function getMethod() {
        return $this->methods;
    }

    public function getStatus() {
        return $this->order_status;
    }

    public static function get_order_status() {
        return (new Order)->getStatus();
    }

    public static function get_order_method_payment() {
        return (new Order)->getMethod();
    }

    public function confirm() {
        $this->status = self::CONFIRM;
        $this->save();
    }

    public function cancel() {
        $this->status = self::CANCEL;
        $this->save();
    }

    public function price() {
        return $this->cart->total_price();
    }
}
