<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public const JOIN = 0;
    public const PARTNER = 1;
    public const VIP = 2;

    protected $table = "customer";

    protected $customer_kind = [
        self::JOIN => "Khách hàng bình thường",
        self::PARTNER => "Khách hàng thân thiết",
        self::VIP => "Khách hàng vip",
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getKinds() {
        return $this->customer_kind;
    }

    public static function get_customer_kinds() {
        return (new Customer)->getKinds();
    }

    public function kind() {
        return $this->customer_kind[$this->type];
    }

    public static function addCustomer($user_id, $type = 0) {
        $customer = new Customer();

        $customer->user_id = $user_id;
        $customer->type = $type;

        return $customer->save();
    }

    public function updateKind($type) {
        $this->type = $type;

        return $this->save();
    }
}
