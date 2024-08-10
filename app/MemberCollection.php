<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberCollection extends Model
{
    protected $fillable = [
        'branch_id', 'member_id', 'collections_types_id', 'service_types_id', 'amount', 'date_collected'
    ];
    //
    public static function rowToColumn($data)
    {
        $row = [];
        $dates = [];
        $members = [];
        $i = 0;
        foreach ($data as $index => $v) {
            if (isset($dates[$i - 1]) && $v->date_collected != $dates[$i - 1]) $members = [];
            if (isset($dates[$i - 1]) && $v->date_collected == $dates[$i - 1] && in_array($v->member->id, $members)) {
                $row[$v->member->firstname . '' . $v->date_collected]->amounts[$v->collections_type->name] = $v->amount;
            } else {
                $obj = new \stdClass();
                $obj->service_type = $v->service_type?->name;
                $obj->date_collected = $v->date_collected;
                $obj->updated_at = $v['updated_at']->toDateTimeString();
                $obj->name = $v->member->firstname;
                $obj->amounts = [];
                $obj->amounts[$v->collections_type->name] = $v->amount;
                $row[$v->member->firstname . '' . $v->date_collected] = $obj;
                array_push($members, $v->member->id);
            }
            array_push($dates, $v->date_collected);
            $i++;
        }
        return $row;
    }

    public static function rowToColumnsssss($data)
    {
        $row = [];
        $dates = [];
        $i = 0;
        foreach ($data as $index => $v) {
            // $member_id = [];
            if (isset($dates[$i - 1]) && $v->date_collected == $dates[$i - 1]) {

                if (isset($members[$i - 1]) && !in_array($v->member->id, $members)) {
                    // code...
                    $row[$v->date_collected]->members[$v->member->id] = new \stdClass();
                    $row[$v->date_collected]->members[$v->member->id]->name = $v->member->firstname;
                }
                $row[$v->date_collected]->members[$v->member->id]->amounts[$v->collections_type->name] = $v->amount;
            } else {
                $members = [];
                $obj = new \stdClass();
                $obj->collections_type = $v->collections_type->name;
                $obj->service_type = $v->service_type->name;
                $obj->date_collected = $v->date_collected;
                $obj->members = [];
                $obj->members[$v->member->id] = new \stdClass();
                $obj->members[$v->member->id]->name = $v->member->firstname;
                $obj->members[$v->member->id]->amounts = [];
                $obj->members[$v->member->id]->amounts[$v->collections_type->name] = $v->amount;
                $row[$v->date_collected]
                    // [$v->member->id]
                    = $obj;
            }
            array_push($dates, $v->date_collected);
            if (isset($members)) array_push($members, $v->member->id);
            $i++;
        }
        return $row;
    }

    public static function getByDate(Member $user, $date)
    {
        return self::where('date_collected', date('Y-m-d', strtotime($date)))->where('branch_id', $user->branch_id)->get(['id'])->count();
    }

    public function service_type()
    {
        return $this->belongsTo(ServiceType::class, 'service_types_id');
    }

    public function collections_type()
    {
        return $this->belongsTo(CollectionsType::class, 'collections_types_id');
    }

    public function user()
    {
        return $this->belongsTo(Branch::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
