<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $guarded = [];

    public function users(){
      return $this->belongsTo(User::class, 'branch_id');
    }
}
