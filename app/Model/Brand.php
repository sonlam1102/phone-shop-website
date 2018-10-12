<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    public function category() {
        return $this->belongsTo('App\Model\Category', 'category_id');
    }
}