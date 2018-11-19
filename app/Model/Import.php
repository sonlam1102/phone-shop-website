<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

//Phieu nhap
class Import extends Model
{
    protected $table = "import";

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function company() {
        return $this->belongsTo('App\Model\Company', 'company');
    }

    public function products() {
        return $this->hasMany('App\Model\ProductImport', 'import_id');
    }

    public function total_price() {
        $products = $this->products;

        $total = 0;

        foreach ($products as $item) {
            $total = $total + $item->product_code->price;
        }

        return $total;
    }

    public static function add_import($user_id, $company_id) {
        $import = new Import();

        $import->user_id = $user_id;
        $import->company_id = $company_id;

        $import->save();

        return $import->id;
    }
}
