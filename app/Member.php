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

    public static function getNameById($id){
      return \DB::table('members')->select('firstname','lastname')->where('id',$id)->orderby('firstname','lastname')->first();
    }

    public static function getNameByEmail($email){
      $std = \DB::table('members')->select('firstname','lastname')->where('email',$email)->orderby('firstname','lastname')->first();
      $name = $std->firstname.' '.$std->lastname;
      return $name;
    }
}
