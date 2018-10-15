<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

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

   public function update_info($data)
   {
       $this->fullname = $data['fullname'];
       $this->address = $data['address'];
       $this->birthday = $data['birthday'];
       $this->city_id = $data['city_id'];
       $this->user_id = $data['user_id'];
       $this->cmnd = $data['cmnd'];
       $this->phone = $data['phone'];
       if ($data['imagePath']) {
           $this->img = $data['imagePath'];
       }

       if ($data['newpass'] && $data['retype_newpass'])
       {
           if ($data['newpass'] == $data['retype_newpass']) {
               $this->user()->update(['password' => Hash::make($data['newpass'])]);
           }
       }
       return $this->save();
   }
}
