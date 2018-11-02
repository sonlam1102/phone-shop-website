<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function attribute() {
        return $this->hasMany('App\Model\ProductAttribute', 'product_id');
    }

    public function category() {
        return $this->belongsTo('App\Model\Category', 'category_id');
    }

    public function brand() {
        return $this->belongsTo('App\Model\Brand', 'brand_id');
    }

    public function company() {
        return $this->belongsTo('App\Company', 'company_id');
    }

    public static function addProduct($data) {
        $product = new Product();
        $product->name = $data['name'];
        $product->code = $data['code'];
        $product->price = $data['price'];
        $product->manufacture_date = $data['manufacture_date'];
        $product->category_id = $data['category'];
        $product->brand_id = $data['brand'];
        $product->company_id = $data['company'];
        $product->img = $data['img'];

        return $product->save();
    }

    public function editProduct($data) {
        $this->name = $data['name'];
        $this->code = $data['code'];
        $this->price = $data['price'];
        $this->manufacture_date = $data['manufacture_date'];
        $this->category_id = $data['category'];
        $this->brand_id = $data['brand'];
        $this->company_id = $data['company'];
        if ($data['img']) {
            $this->img = $data['img'];
        }

        return $this->save();
    }
}
