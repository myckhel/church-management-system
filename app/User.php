<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Cache;
use App\ServiceType;
use App\CollectionsType;

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

    public function getServiceTypes(){
      return ServiceType::getTypes();
    }

    public function getCollectionTypes(){
      return CollectionsType::getTypes();
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

    public function collections_types(){
      $this->hasMany(CollectionsType::class);
    }

    public function service_type(){
      $this->hasMany(ServiceType::class);
    }

    public function savings(){
      $this->hasMany(Savings::class);
    }

    public function MemberSavings(){
      $this->hasMany(MemberSavings::class);
    }
}
