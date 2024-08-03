<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Branch;

class ServiceType extends Model
{
    //
    protected $fillable = [
        'name', 'branch_id'
    ];

    public static function getTypes()
    {
        return ServiceType::all();
    }

    public function user()
    {
        $this->belongsTo(Branch::class);
    }

    public function savings()
    {
        $this->hasMany(Savings::class);
    }

    public function member_savings()
    {
        $this->hasMany(MemberSavings::class);
    }

    public function members_attendances()
    {
        $this->hasMany(members_attendance::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
