<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Savings extends Model
{
    //
    protected $fillable = [
      'branch_id','collections_types_id','service_types_id','amount','date_collected'
    ];

    public static function getByDate(User $user, $date){
      return Savings::where('date_collected', date('Y-m-d',strtotime($date)) )->where('branch_id',$user->id )->get(['id'])->count();
    }

    public function member_savings(){
      return $this->hasMany(MemberSavings::class);
    }

    public function service_types(){
      return $this->belongsTo(ServiceType::class);
    }

    public function collections_types(){
      return $this->belongsTo(CollectionsType::class);
    }

    public function user(){
      return $this->belongsTo(User::class);
    }
}
