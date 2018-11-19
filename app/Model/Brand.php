<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

//Nhan hieu
class Brand extends Model
{
    protected $table = 'brands';

    public function category() {
        return $this->belongsTo('App\Model\Category', 'category_id');
    }

    public static function addBrand($data) {
        $brand = new Brand();

        $brand->name = $data['name'];
        $brand->category_id = $data['category'];

        return $brand->save();
    }

    public function updateBrand($data) {
        $this->name = $data['name'];
        $this->category_id = $data['category'];

        return $this->save();
    }
}
