<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','branchname','branchcode','address','isadmin', 'city', 'state', 'country', 'currency',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin(){

        return ($this->isadmin == "true") ? true : false;
    }

    public function getName(){

        return "$this->branchname";
    }

    public function getCurrencySymbol(){
      $currency = $this->currency;
      return \DB::table('country')->select('currency_symbol')->where('ID', '=', $currency)->first();
    }

    public function isOnline()
    {
      return Cache::has('user-is-online-' . $this->id);
    }

    public function getUserById($id){
      return \App\User::where($id)->get();
    }

    public function group(){
      return $this->hasMany(Group::class);
    }

    public function member(){
      return $this->hasMany(Member::class);
    }

    public function option(){
      $this->hasMany(Options::class);
    }
}
