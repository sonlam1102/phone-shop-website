<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function attribute() {
        return $this->hasMany('App\Model\ProductAttribute', 'product_id');
    }
}
