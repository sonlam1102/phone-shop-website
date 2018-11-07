<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function manager() {
        return $this->belongsTo('App\User', 'user_check_id');
    }
}
