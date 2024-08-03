<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberAttendance extends Model
{
    //
    protected $fillable = [
        'member_id', 'attendance', 'date', 'branch_id', 'service_types_id'
    ];

    public function service_type()
    {
        return $this->belongsTo(ServiceType::class, 'service_types_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
