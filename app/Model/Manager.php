<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = "manager_user";

    public function company() {
        return $this->belongsTo('App\Model\Company', 'company_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public static function addManger($user_id, $company_id) {
        $manager = new Manager();

        $manager->user_id = $user_id;
        $manager->company_id = $company_id;

        return $manager->save();
    }

    public function updateManager($company) {
        $this->company_id = $company;
        $this->save();
    }
}
