<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Setting extends Model
{
    //
    public static function findName(Array $names){
      $newNames = [];
      foreach ($names as $name){
        $setting = self::where('name', $name)->first();
        if ($setting) {
        $newNames[$name] = $setting->value;
        }
      }
      return $newNames;
    }

    public static function uploadLogo(Request $request){
      $image_name = 'logo.png'; // default logo image
      if ($request->hasFile('photo'))
      {
          $image = $request->file('photo');
          $input['imagename'] = $image_name;

          $destinationPath = public_path('/images');

          $image->move($destinationPath, $input['imagename']);

          $image_name = $input['imagename'];

          $setting = self::getOneSetting('logo');

          if (!$setting) {
            $setting = new self();
            $setting->name = 'logo';
          }

          $setting->value = $image_name;
          $setting->save();
          return response()->json(['status' => true,]);
      }
      return response()->json(['status' => false, 'text' => "No photo file"]);
    }

    public static function saveAppName(Request $request){
      $name = $request->name;
      if ($name)
      {
        $setting = self::getOneSetting('name');

        if (!$setting) {
          $setting = new self();
          $setting->name = 'name';
        }

        $setting->value = $name;

        if ($request->hasFile('logo')){
          self::uploadLogo($request);
        }

        $setting->save();
        return response()->json(['status' => true,]);
      }
      return response()->json(['status' => false, 'text' => "No Name set"]);
    }

    // Relationship
    public static function getOneSetting($name){
      return self::where('name', $name)->first();
    }

    public static function notSet(){
      return !self::getOneSetting('logo');
    }

}
