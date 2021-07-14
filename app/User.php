<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Cache;
use App\ServiceType;
use App\CollectionsType;
use Dcblogdev\Countries\Facades\Countries;

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

        return $this->isadmin;
    }

    public function getName(){
      return "$this->branchname";
    }

    public static function getCurrency(){
      $curObj;
      $currency = auth()->user()->currency;
      foreach (Countries::all() as $value) {
        if ($value->currency_symbol == $currency) {
          $curObj = $value;
          break;
        }
      }
      return $curObj;
    }

    public static function toMoney($number){
      $currency = self::getCurrency();
      return $currency->currency_symbol.number_format((float) $number);
    }

    public function getCurrencySymbol(){
      return self::getCurrency();
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
      return \App\User::find($id);
    }

    public function creation(){

      return ;
    }

    public function group(){
      return $this->hasMany(Group::class);
    }

    public function members(){
      return $this->hasMany(Member::class, 'branch_id');
    }

    public function option(){
      return $this->hasMany(Options::class);
    }

    public function collections_types(){
      return $this->hasMany(CollectionsType::class);
    }

    public function service_type(){
      return $this->hasMany(ServiceType::class);
    }

    public function collections(){
      return $this->hasMany(Collection::class, 'branch_id');
    }

    public function MemberSavings(){
      return $this->hasMany(MemberSavings::class);
    }

    public function collections_commissions(){
      return $this->hasMany(CollectionCommission::class, 'branch_id');
    }

    public function payments(){
      return $this->hasMany(Payment::class, 'branch_id');
    }
}
