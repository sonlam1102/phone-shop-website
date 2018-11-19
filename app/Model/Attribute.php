<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

//Thuoc tinh san pham
class Attribute extends Model
{
    protected $table = 'attributes';

    public static function addAttribute($data) {
        $attribute = new Attribute();
        $attribute->name = $data['name'];

        return $attribute->save();
    }

    public function updateAttribute($data) {
        $this->name = $data['name'];

        return $this->save();
    }
}