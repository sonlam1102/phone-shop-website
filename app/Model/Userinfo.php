<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    protected $table = 'userinfos';

    protected $fillable = [
        'fullname', 'address', 'cmnd', 'birthday', 'img'
    ];

   public function user()
   {
       return $this->belongsTo('App\User', 'user_id');
   }

   public function city()
   {
       return $this->belongsTo('App\Model\City', 'city_id');
   }
}
