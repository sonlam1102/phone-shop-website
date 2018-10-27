<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';

    public function user() {
        return $this->belongsTo('App\User', 'user_id_manager');
    }

    public function city() {
        return $this->belongsTo('App\Model\City', 'city_id');
    }
}
