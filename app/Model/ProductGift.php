<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductGift extends Model
{
    protected $table = "product_gift";

    public function product() {
        return $this->belongsTo('App\Model\Product', 'product_id');
    }

    public function company() {
        return $this->belongsTo('App\Model\Company', 'company_id');
    }

    public function status() {
        return $this->is_active ? "Đang diễn ra" : "Đã kết thúc";
    }

    public function accessories() {
        return $this->hasMany('App\Model\ProductGiftAccessories', 'product_gift_id');
    }

    public static function add_gift($data) {
        $gift = new ProductGift();

        $gift->discount = $data['discount'];
        $gift->product_id = $data['product'];
        $gift->description = $data['description'];
        $gift->company_id = $data['company'];

        $gift->save();

        if ($data['accessories']) {
            foreach ($data['accessories'] as $item) {
                ProductGiftAccessories::add_accessories($gift->id, $item->item, $item->quantity);
            }
        }
    }

    public function update_gift($data) {
        $this->discount = $data['discount'];
        $this->description = $data['description'];
        $this->company_id = $data['company'];
        $this->is_active = $data['status'];

        $this->save();
    }
}
