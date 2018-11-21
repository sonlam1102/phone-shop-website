<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const TYPE_ADMIN = 0;
    const TYPE_MANAGER = 1;
    const TYPE_USER = 2;
    const TYPE_SELLER = 3;

    const ACTIVE = 1;
    const DISABLE = 0;

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
        return $this->hasOne('App\Model\Userinfo', 'user_id');
    }

    public function manager() {
        return $this->hasOne('App\Model\Manager', 'user_id');
    }

    public function orders() {
        return $this->hasMany('App\Model\Order', 'user_id');
    }

    public function carts() {
        return $this->hasMany('App\Model\Cart', 'user_id')->orderBy('id', 'desc');
    }

    public function checked_order() {
        return $this->hasMany('App\Model\OrderCheck', 'user_id');
    }

    public function staff_info() {
        return $this->hasOne('App\Model\Staff','user_id');
    }

    public function current_cart() {
        return $this->carts->first() ? !$this->carts->first()->ordered ? $this->carts->first() : null : null;
    }

    public static function getManager() {
        $data = self::select()->where('type', '=', self::TYPE_MANAGER);
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
            'type' => self::TYPE_MANAGER,
        ]);
    }

    public static function addStaff($data) {
        return User::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => Hash::make("123456"),
            'type' => self::TYPE_SELLER,
        ]);
    }

    public function fullname() {
        return $this->userinfo ? $this->userinfo->fullname : $this->name;
    }
}
