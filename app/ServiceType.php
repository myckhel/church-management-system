<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    //
    protected $fillable = [
        'name', 'branch_id'
    ];

    public function user(){
      $this->belongsTo(User::class);
    }
}
