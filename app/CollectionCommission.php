<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Collection;

class CollectionCommission extends Model
{
    //
    protected $fillable = [
        'branch_id', 'settled', 'collection_date'
    ];
    protected $table = 'collections_commissions';

    public static function getUserUnsettled(){
      return auth()->user()->collections_commissions->where('settled', false);
    }

    public static function savingsPercentage(array $savings){
      $percentage = (float)(\App\Options::getLatestCommission())->value;
      $total = 0.00;
      foreach ($savings as $key => $saving) {
        $total += (float)$saving->total;
      }
      return number_format((float)($total * ($percentage / 100)), 2, '.', '');
    }

    public static function mySelfByDate($date){
      return auth()->user()->collections_commissions->where('collection_date', $date)->where('settled', false)->first();
    }

    public static function getDueCommissions(User $user = null){
      return $due = CollectionCommission::
        select('users.id as branch_id', 'collections.id', 'collections.service_types_id', 'collections.collections_types_id', 'collections.amount',
         'collections_commissions.collection_date')
        ->where(isset($user) ? 'collections_commissions.branch_id' : [] , isset($user) ? $user->id : [])
        ->where('settled', false)
        // ->with('savings.date_collected')
        // ->with('users')
        ->leftJoin('collections', 'collections.date', 'collection_date')
        ->leftJoin('users', 'users.id', 'collections.branch_id')
        ->where(isset($user) ? 'collections.branch_id' : [], isset($user) ? $user->id : [])
        ->get();
    }

    public static function dueSavings(User $user = null){
      $dueRows = CollectionCommission::getDueCommissions(isset($user) ? $user: null);
      // dd($dueRows);
      $savings = [];
      foreach ($dueRows as $key => $commission) {
        //
        if (!isset($savings[$commission->branch_id])) {
          $savings[$commission->branch_id] = [];
        }
        //
        $savings[$commission->branch_id][] = \App\Collection::find($commission->id);
      }
      //
      foreach ($savings as $key => $value) {
        // code...
        $savings[$key] = \App\Collection::rowToColumn($value, 'no_obj');
      }
      // dd($savings);
      return $savings;
    }

    public static function calculateUnsettledCommission(bool $type = false){
      $user = \Auth::user();
      $percentage = \App\Options::getLatestCommission();
      $percentage = $percentage ? (float)$percentage->value : 0;
      $total = $type ? [] : 0;
      $dueCommissions = $type ? [] : 0;
      if ($type) {
        // get the
        $unsettle = CollectionCommission::dueSavings();
        // declare a total class to contain savings
        foreach ($unsettle as $branch_id => $branch) {
          // dd($saving);
          if (!isset($total[$branch_id])) {
            $total[$branch_id] = 0;
          }
          foreach ($branch as $date => $saving) {
            // dd($saving);
            $total[$branch_id] += (float)$saving->total;
          }
        }
        // calculate each branch commission
        foreach ($total as $key => $value) {
          // code...
          $dueCommissions[$key] = (float)($value * ($percentage / 100));
        }
      } else {
        $unsettle = CollectionCommission::getDueCommissions($user);
        // dd($unsettle);
        foreach ($unsettle as $key => $saving) {
          // dd($saving);
          $total += (int)$saving->amount;
        }
        // calculate the percentage
        $dueCommissions = number_format((float)($total * ($percentage / 100)), 2, '.', '');
      }
      return $dueCommissions;
    }

    public static function setCollection(Collection $savings){
      $user = \Auth::user();
      return CollectionCommission::create([
        'collection_date' => $savings->date,
        'branch_id' => $user->id,
      ]);
    }

    public static function undue(array $ids){
      foreach ($ids as $key => $due) {
        // code...
        $due = self::find($due);
        // dd($due);
        $due->settled = true;
        $due->save();
      }
      return true;
    }

    public function users(){
      return $this->belongsTo(User::class);
    }

    public function savings(){
      return $this->belongsTo(Collection::class, 'date');
    }
}
