<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class H_O_Options extends Model
{
    //
    public function options(){
      return DB::table('head_office_options')->where('HOID',1)->first();
    }
}
