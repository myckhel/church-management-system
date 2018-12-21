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
      $this->hasMany(MemberSavings::class);
    }

    public function user(){
      $this->belongsTo(User::class);
    }
}
