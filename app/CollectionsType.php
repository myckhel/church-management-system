<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectionsType extends Model
{
    //
    protected $fillable = [
        'name', 'branch_id'
    ];

    public function user(){
      $this->belongsTo(User::class);
    }

    public static function getTypes(){
      return CollectionsType::all();
    }

    public function savings(){
      $this->hasMany(Savings::class);
    }

    public function MemberSavings(){
      $this->hasMany(MemberSavings::class);
    }
}
