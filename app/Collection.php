<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
      'branch_id','collections_types_id','service_types_id','amount','date'
    ];

    public static function getByDate(User $user, $date){
      return self::where('date', date('Y-m-d',strtotime($date)) )->where('branch_id',$user->id )->get(['id'])->count();
    }

    // function to turn multiple table row to a single row of the same date column
    public static function rowToColumn($data, $type = false) {
      // dd($data);
      $row = [];
      $dates = [];
      $i = 0;
      foreach($data as $index => $v) {
        // we have a date and collection's date is date we have
        if(isset($dates[$i-1]) && $v->date == $dates[$i-1]){
          // insert collection with same date to the $row
          $row[$v->date]->amounts[$v->collections_types->name] = $v->amount;
          $row[$v->date]->total += $v->amount;
        } else {
          $obj = new \stdClass();
          // copy collection to $obj
          foreach (get_object_vars($v) as $key => $value) {
            $obj->$key = $value;
          }
          // give $obj some of the collection property's name
          $obj->service_types = $v->service_types->name;
          if ($type == 'branch') {
            $obj->branch_name = $v->users->branchname;
          }
          $obj->date_collected = $v->date;
          $obj->updated_at = $v['updated_at']->toDateTimeString();
          $obj->amounts = [];
          $obj->amounts[$v->collections_types->name] = $v->amount;
          $obj->total = $v->amount;
          $row[$v->date] = $obj;
        }
        // insert to $dates the colllection date
        array_push($dates, $v->date);
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
        $date_collected = $v->date;

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
