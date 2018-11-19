<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

//Cua hang
class Company extends Model
{
    protected $table = 'company';

    public function user() {
        return $this->belongsTo('App\User', 'user_id_manager');
    }

    public function city() {
        return $this->belongsTo('App\Model\City', 'city_id');
    }

    public function staffs() {
        return $this->hasMany('App\Model\Staff', 'company_id');
    }

    public function products() {
        return $this->hasMany('App\Model\Product', 'company_id');
    }

    public function imports() {
        return $this->hasMany('App\Model\Import', 'company_id');
    }

    public function exports() {
        return $this->hasMany('App\Model\Export', 'company_id');
    }

    public static function addCompany($data) {
        $company = new Company();

        $company->name = $data['name'];
        $company->address = $data['address'];
        $company->city_id = $data['city'];

        if ($data['manager']) {
            $company->user_id_manager = $data['manager'];;
        }

        return $company->save();
    }

    public function updateCompany($data) {
        $this->name = $data['name'];
        $this->address = $data['address'];
        $this->city_id = $data['city'];

        $this->user_id_manager = $data['manager'];

        return $this->save();
    }
}
