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
        $product->price = $data['price'];
        $product->manufacture_date = $data['manufacture_date'];
        $product->category_id = $data['category'];
        $product->brand_id = $data['brand'];
        $product->company_id = $data['company'];
        $product->img = $data['img'];
        $product->quantity = $data['quantity'];
        $product->description = $data['description'];

        $check = $product->save();

        try {
            foreach ($data['attributes'] as $item) {
                $check = ProductAttribute::createAttribute($product->id, $item->attribute, $item->value);
            }
        }
        catch (\Exception $e) {
            //TODO: execption message
        }

        return $check;
    }

    public function editProduct($data) {
        $this->name = $data['name'];
        $this->price = $data['price'];
        $this->manufacture_date = $data['manufacture_date'];
        $this->category_id = $data['category'];
        $this->brand_id = $data['brand'];
        $this->company_id = $data['company'];
        if ($data['img']) {
            $this->img = $data['img'];
        }
        $this->quantity = $data['quantity'];
        $this->description = $data['description'];

        $current_attributes = [];
        if ($this->attribute) {
            foreach ($this->attribute as $item) {
                array_push($current_attributes, $item->id);
            }
        }

        $submit_attributes = [];
        if ($data['attributes']) {
            foreach ($data['attributes'] as $item) {
                if (isset($item->id)) {
                    array_push($submit_attributes, $item->id);
                }
            }
        }

        try {
            foreach ($current_attributes as $item) {
                if (!in_array($item, $submit_attributes)) {
                    $productAttribute = ProductAttribute::find($item);
                    $productAttribute->delete();
                }
            }
        }
        catch (\Exception $e) {
            //TODO: execption message
        }

        foreach ($data['attributes'] as $item) {
            if (isset($item->id)) {
                $productAttribute = ProductAttribute::find($item->id);
                $productAttribute->updateAttribute($item->value, $item->attribute);
            }
            else {
                ProductAttribute::createAttribute($this->id, $item->attribute, $item->value);
            }
        }

        return $this->save();
    }
}
