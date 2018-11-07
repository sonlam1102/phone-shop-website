<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
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

}
