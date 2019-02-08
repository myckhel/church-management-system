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

    public static function rowToColumn($data, $type = false) {
      $row = [];
      $dates = [];
      $i = 0;
      foreach($data as $index => $v) {
        if(isset($dates[$i-1]) && $v->date_collected == $dates[$i-1]){
            $row[$v->date_collected]->amounts[$v->collections_types->name] = $v->amount;
            $row[$v->date_collected]->total += $v->amount;
        } else {
          $obj = new \stdClass();
          foreach (get_object_vars($v) as $key => $value) {
            $obj->$key = $value;
          }
          // $obj->collections_types = $v->collections_types->name;
          $obj->service_types = $v->service_types->name;
          if ($type == 'branch') {
            $obj->branch_name = $v->users->branchname;
          }
          $obj->date_collected = $v->date_collected;
          $obj->updated_at = $v['updated_at']->toDateTimeString();
          $obj->amounts = [];
          $obj->amounts[$v->collections_types->name] = $v->amount;
          $obj->total = $v->amount;
          $row[$v->date_collected] = $obj;
        }
        array_push($dates, $v->date_collected);
        $i++;
      }
      return $row;
    }

    public static function rowToColumnByField($data) {
      $row = [];
      foreach($data as $index => $v) {
        $name =  $v->users->branchname;
        $amount = $v->amount;
        $collectionName = $v->collections_types->name;
        $serviceName = $v->service_types->name;
        $date_collected = $v->date_collected;

        if(!isset($row[$name])) {
          $row[$name] = [];
        }

        if (!isset($row[$name][$date_collected])) {
          $row[$name][$date_collected] = [];
        }

        if (!isset($row[$name][$date_collected]['amounts'])) {
          $row[$name][$date_collected]['amounts'] = [];
          $row[$name][$date_collected]['service_type'] = $serviceName;
        }

        $row[$name][$date_collected]['amounts'][$collectionName] = $amount;
      }

      return $row;
    }

    public function service_types(){
      return $this->belongsTo(ServiceType::class);
    }

    public function collections_types(){
      return $this->belongsTo(CollectionsType::class);
    }

    public function users(){
      return $this->belongsTo(User::class, 'branch_id');
    }

    public function collections_commissions(){
      return $this->hasMany(CollectionCommission::class);
    }
}
