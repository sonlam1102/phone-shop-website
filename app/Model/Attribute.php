<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'attributes';

    public function category() {
        return $this->belongsTo('App\Model\Category', 'category_id');
    }

    public static function addAttribute($data) {
        $attribute = new Attribute();

        $attribute->name = $data['name'];
        $attribute->category_id = $data['category'];

        return $attribute->save();
    }

    public function updateAttribute($data) {
        $this->name = $data['name'];
        $this->category_id = $data['category'];

        return $this->save();
    }
}