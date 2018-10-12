<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'attributes';

    public function category() {
        return $this->belongsTo('App\Model\Category', 'category_id');
    }
}