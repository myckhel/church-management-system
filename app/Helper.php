<?php
namespace App;
/**
 *
 */
class Helper
{
  public static function useConfig($name, $array = []){
    return array_merge($array,
      [
        'driver'    => env('FILESYSTEM_DRIVER', 'local'),
        'root'      => public_path("medias/$name"),
        'url'       => env('APP_URL')."/medias/$name",
        'visibility'=> 'public',
        // 'prefix'    => "medias/$name"
      ]);
  }
}

?>
