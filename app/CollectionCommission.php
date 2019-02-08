<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Savings;

class CollectionCommission extends Model
{
    //
    protected $fillable = [
        'saving_id', 'branch_id', 'settled', 'saving_date_collected'
    ];
    protected $table = 'collections_commissions';

    public static function getDueCommissions(User $user){
      return $due = CollectionCommission::where('collections_commissions.branch_id', $user->id)
        ->where('settled', false)
        // ->with('savings')
        ->leftJoin('savings', 'savings.date_collected', 'saving_date_collected')->where('savings.branch_id', $user->id)
        ->get();
    }

    public static function dueSavings(User $user){
      $dueRows = CollectionCommission::getDueCommissions($user);
      $savings = [];
      foreach ($dueRows as $key => $commssion) {
        $savings[] = \App\Savings::find($commssion->id); //$commssion->id;
      }
      $savings = \App\Savings::rowToColumn($savings, 'no_obj');
      // dd($savings);
      return $savings;
    }

    public static function calculateUnsettledCommission(){
      $user = \Auth::user();
      // get the
      $percentage = (int)(\App\Options::getLatestCommission())->value;
      $unsettle = CollectionCommission::getDueCommissions($user);
        // dd($unsettle);
        $total = 0;
      foreach ($unsettle as $key => $saving) {
        // dd($saving);
        $total += (int)$saving->amount;
      }
      // calculate the percentage
      $dueCommission = (float)($total * ($percentage / 100));
      // dd($dueCommission);
      return $dueCommission;
    }

    public static function setCollection(Savings $savings){
      $user = \Auth::user();
      return CollectionCommission::create([
        'saving_date_collected' => $savings->date_collected,
        'branch_id' => $user->id,
      ]);
    }

    public function user(){
      $this->belongsTo(User::class);
    }

    public function savings(){
      $this->belongsTo(Savings::class, 'date_collected');
    }
}
