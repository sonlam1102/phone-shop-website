<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = "staff_user";

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public static function addStaff($user_id, $manager_id) {
        $staff = new Staff();

        $staff->user_id = $user_id;
        $staff->manager_id = $manager_id;

        return $staff->save();
    }
}
