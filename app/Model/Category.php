<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function brands() {
        return $this->hasMany('App\Model\Brands');
    }

    public function update_category($data) {
        $this->name = $data['name'];

        return $this->save();
    }
}