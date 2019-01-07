<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class members_attendance extends Model
{
    //
    protected $fillable = [
      'member_id','attendance','attendance_date','branch_id','service_types_id'
    ];

    public function service_types(){
      return $this->belongsTo(ServiceType::class);
    }

    public function members(){
      return $this->belongsTo(Member::class);
    }
}
