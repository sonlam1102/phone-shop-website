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

    public static function addCompany($data) {
        $company = new Company();

        $company->name = $data['name'];
        $company->address = $data['address'];
        $company->city_id = $data['city'];

        return $company->save();
    }
}
