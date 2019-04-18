<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    public static function getOneSetting($name){
      return self::where('name', $name)->first();
    }

    public static function notSet(){
      return !self::getOneSetting('logo');
    }

}
