<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $guarded = [];

    public function branches()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
