<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeForm extends Model
{
    protected $table = "product_attribute_form";

    public function attribute_items() {
        return $this->hasMany('App\Model\AttributeFormItem', 'product_attribute_form_id');
    }

    public function category() {
        return $this->belongsTo('App\Model\Category', 'category_id');
    }

    public static function makeForm($name, $category) {
        $product_form = new ProductAttributeForm();

        $product_form->name = $name;
        $product_form->category_id = $category;

        $product_form->save();

        return $product_form->id;
    }

    public function editItem($category, $data) {
        $current_item = [];

        if ($this->attribute_items) {
            foreach ($this->attribute_items as $item) {
                array_push($current_item, $item['id']);
            }
        }

        $submit_item = [];
        if ($data) {
            foreach ($data as $item) {
                if (isset($item->id)) {
                    array_push($submit_item, $item->id);
                }
            }
        }

        foreach ($current_item as $item) {
            if (!in_array($item, $submit_item)) {
                $attribute_item = AttributeFormItem::find($item);
                $attribute_item->delete();
            }
        }

        foreach ($data as $item) {
            if (!isset($item->id)) {
                AttributeFormItem::addItem($this->id, $item->attribute);
            }
        }

        $this->category_id = $category;
        return $this->save();
    }
}
