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

    public static function currencySymbol(){
      $currency = \App\Options::getOneBranchOption('currency', \Auth::user());
      // $currency = \App\Options::where('name', 'currency')->first();
      $currency = \DB::table('country')->where('currency_symbol', isset($currency->value) ? $currency->value : '₦')->first();
      return $currency;
    }

    public static function toMoney($number){
      $symbol = self::currencySymbol();
      return $symbol->currency_symbol.number_format((float) $number);
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
      return \App\User::find($id);
    }

    public function creation(){

      return ;
    }

    public function group(){
      return $this->hasMany(Group::class);
    }

    public function member(){
      return $this->hasMany(Member::class);
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

    public function savings(){
      return $this->hasMany(Savings::class, 'branchcode');
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
