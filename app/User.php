<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'type', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userinfo() {
        return $this->hasOne('App\Model\Userinfo');
    }

    public function company() {
        return $this->hasOne('App\Model\Company', 'user_id_manager');
    }

    public static function getManager() {
        $data = self::select()->where('type', '=', Tools\UserType::TYPE_MANAGER);
        return $data ? $data->get() : null;
    }

    public function changePassword($newPass, $confirmPass) {
        if ($newPass == $confirmPass) {
            $this->password = Hash::make($newPass);
            return $this->save();
        }
        return false;
    }

    public function resetPassword() {
        $this->password = Hash::make("123456");
        return $this->save();
    }

    public static function addManager($data) {
        return User::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => Hash::make("123456"),
            'type' => \App\Tools\UserType::TYPE_MANAGER,
        ]);
    }
}
