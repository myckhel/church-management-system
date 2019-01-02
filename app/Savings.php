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

    public static function rowToColumn($data) {
      $row = [];
      $dates = [];
      $i = 0;
      foreach($data as $index => $v) {
        if(isset($dates[$i-1]) && $v->date_collected == $dates[$i-1]){
            $row[$v->date_collected]->amounts[$v->collections_types->name] = $v->amount;
        } else {
          $obj = new \stdClass();
          $obj->collections_types = $v->collections_types->name;
          $obj->service_types = $v->service_types->name;
          $obj->date_collected = $v->date_collected;
          $obj->amounts = [];
          $obj->amounts[$v->collections_types->name] = $v->amount;
          $row[$v->date_collected] = $obj;
        }
        array_push($dates, $v->date_collected);
        $i++;
      }
      return $row;
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
