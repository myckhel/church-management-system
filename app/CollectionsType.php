<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectionsType extends Model
{
    //
    protected $fillable = [
        'name', 'branch_id'
    ];

    public static function formatString ($input) {
        $newName = '';
        for ($l = 0; $l < strlen($input); $l++) {
          if ($input[$l] == '-' || $input[$l] == ' ') {
            $newName .= '_';
          } else {
            $newName .= $input[$l];
          }
        }
        return $newName;
    }

    public function disFormatString () {
      $input = $this->name;
        $newName = '';
        for ($l = 0; $l < strlen($input); $l++) {
          if ($input[$l] == '_') {
            $newName .= ' ';
          } else {
            $newName .= $input[$l];
          }
        }
        return ucwords($newName);
    }
    // public static function disFormatString ($input) {
    //     $newName = '';
    //     for ($l = 0; $l < strlen($input); $l++) {
    //       if ($input[$l] == '_') {
    //         $newName .= ' ';
    //       } else {
    //         $newName .= $input[$l];
    //       }
    //     }
    //     return ucwords($newName);
    // }

    public static function disFormatStringAll($types){
      foreach ($types as $key => $value) {
        $value->name = $value->disFormatString();
      }
    }

    public function user(){
      $this->belongsTo(User::class);
    }

    public static function getTypes(){
      return CollectionsType::all();
    }

    public function savings(){
      $this->hasMany(Collection::class);
    }

    public function MemberSavings(){
      $this->hasMany(MemberSavings::class);
    }
}
