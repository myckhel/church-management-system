<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded = ['id'];

    public function getFullname(){

        return "$this->firstname $this->lastname";
        
    }

    public function InGroup($group_id){

        $count = \App\GroupMember::where('member_id', $this->id)->where('group_id', $group_id)->get()->count();

        return $count > 0 ;
    }
}
