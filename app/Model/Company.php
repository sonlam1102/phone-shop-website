<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

//Cua hang
class Company extends Model
{
    protected $table = 'company';

    public function manager() {
        return $this->hasOne('App\Model\Manager', 'company_id');
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

    public function gifts() {
        return $this->hasMany('App\Model\ProductGift', 'company_id');
    }

    public static function addCompany($data) {
        $company = new Company();

        $company->name = $data['name'];
        $company->address = $data['address'];
        $company->city_id = $data['city'];

        $company->save();

        return $company->id;
    }

    public function manager_info() {
        return $this->manager ? $this->manager->user : null;
    }

    public function updateCompany($data) {
        $this->name = $data['name'];
        $this->address = $data['address'];
        $this->city_id = $data['city'];

        return $this->save();
    }

    public function total_checked_order() {
        $total = 0;
        $total = $total + $this->manager->user->checked_order->count();

        foreach ($this->staffs as $item) {
            $total = $total + $item->user->checked_order->count();
        }

        return $total;
    }

    public function total_price_orders() {
        $total = 0;

        foreach ($this->manager->user->checked_order as $item) {
            if ($item->order->status != Order::PENDING && $item->order->status != Order::CANCEL) {
                $total = $total + $item->order->price();
            }
        }

        foreach ($this->staffs as $item) {
            $total = $total + $item->user->checked_order->count();
        }

        return $total;
    }

    public function total_product_ready() {
        $total = 0;

        foreach ($this->products as $item) {
            $total = $total + $item->codes->where('is_sold', '=', false)->count();
        }

        return $total;
    }
}
