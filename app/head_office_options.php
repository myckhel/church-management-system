<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class head_office_options extends Model
{
    //
    public function options(){
      return DB::table('head_office_options')->where('HOID',1)->first();
    }
}
