<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

//Nhan vien trong cua hang
class Staff extends Model
{
    protected $table = "staff_user";

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function company() {
        return $this->belongsTo('App\Model\Company', 'company_id');
    }

    public static function addStaff($user_id, $company_id) {
        $staff = new Staff();

        $staff->user_id = $user_id;
        $staff->company_id = $company_id;

        return $staff->save();
    }
}
