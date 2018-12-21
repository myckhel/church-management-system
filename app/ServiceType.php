<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ServiceType extends Model
{
    //
    protected $fillable = [
        'name', 'branch_id'
    ];

    public function user(){
      $this->belongsTo(User::class);
    }

    public static function getTypes(){
      return ServiceType::all();
    }

    
}
