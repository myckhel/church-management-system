<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = ['id'];


    public function getNumberOfMembers(){

        return GroupMember::where('group_id', $this->id)->get()->count();
    }
}
