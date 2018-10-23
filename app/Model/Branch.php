<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branch';

    public function user() {
        return $this->belongsTo('App\User', 'user_id_manager');
    }

    public function city() {
        return $this->belongsTo('App\Model\City', 'city_id');
    }
}
