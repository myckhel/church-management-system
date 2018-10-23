<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = ['id'];


    public function getNumberOfMembers($branch_id){

        return GroupMember::where('group_id', $this->id)->where('for_branch',$branch_id)->get()->count();
    }

    public function groupMember(){
      return $this->hasMany(GroupMember::class);
    }

    public function user(){
      return $this->belongsTo(User::class);
    }
}
