<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    //
    protected $fillable = [
      'branch_id', 'details', 'by_who', 'start_date', 'stop_date', 'start_time', 'stop_time'
    ];
}
