<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

//Danh muc san pham
class Category extends Model
{
    protected $table = 'categories';

    public function brands() {
        return $this->hasMany('App\Model\Brands');
    }

    public function products() {
        return $this->hasMany('App\Model\Product', 'category_id');
    }

    public function total_product_availables() {
        $total = 0;

        foreach ($this->products as $item) {
            $total = $total + $item->product_remain_quantity();
        }

        return $total;
    }

    public function update_category($data) {
        $this->name = $data['name'];

        return $this->save();
    }
}