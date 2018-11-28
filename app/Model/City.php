<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

//Tinh - thanh pho
class City extends Model
{
    protected $table = 'cities';

    public function company() {
        return $this->hasMany('App\Model\Company', 'city_id');
    }

    public function update_city($data) {
        $this->name = $data['name'];
        $this->code = $data['code'];

        return $this->save();
    }
}
