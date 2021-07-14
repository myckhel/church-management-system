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
      return \DB::table('members')->select('firstname','lastname')
        ->where('id',$id)->orderby('firstname')->orderBy('lastname')->first();
    }

    public static function getNameByEmail($email){
      if($std = Member::select('firstname','lastname')
        ->where('email',$email)->orderby('firstname')->orderBy('lastname')->first()){
        $name = $std->firstname.' '.$std->lastname;
        return $name;
      }
      return null;
    }

    public static function getPhotoByEmail($email){
      return $std = Member::select('photo')->where('email',$email)->first()->photo;
    }

  public function upgrade(){
    $this->member_status = 'old';
    $this->save();
    return $this->getFullname();
  }

  public function profile(){
    return route('member.profile', ['id' => $this->id]);//../member/profile/${id}
  }

  public function groupMember(){
    return $this->belongsTo(GroupMember::class);
  }

  public function user(){
    return $this->belongsTo(User::class);
  }

  public function member_savings(){
    return $this->hasMany(MemberSavings::class);
  }

  public function attendances(){
    return $this->hasMany(MemberAttendance::class);
  }
}
