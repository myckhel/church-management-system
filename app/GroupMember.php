<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
  protected $guarded = ['id'];

  public function group(){
    return $this->belongsTo(Group::class);
  }

  public function member(){
    return $this->hasMany(Member::class);
  }
}
