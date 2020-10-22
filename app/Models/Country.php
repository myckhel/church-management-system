<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use Searchable;
    protected $searches = [];

    public function users(){
      return $this->hasMany(User::class);
    }
    public function churches(){
      return $this->hasMany(Church::class);
    }

    public static function scopeSearchWithState($q, $country, $state)
    {
      $q->addSelect(['name', 'id'])->where('name', $country)->with(['state' => function ($q) use($state){
        $terms = stringToTerms($state);
        foreach ($terms as $i => $term) {
          $q->mapLikeTerms($terms, 'name', $i);
        }
      }]);
    }

    public function scopeSearch($q, $search, $split = true)
    {
      if ($search) {
        $terms = $split ? stringToTerms($search) : $search;
        if ($split) {
          foreach ($terms as $i => $term) {
            $q->mapLikeTerms($terms, 'name', $i);
          }
        } else {
          $q->whereLike($terms, 'name');
        }
      }
    }

    public function scopeWhereStateInCountry($q, $country, $state)
    {
      $q->where('name', $country)
      ->whereHas('state', function ($q) use($state){
        $terms = stringToTerms($state);
        foreach ($terms as $i => $term) {
          $q->mapLikeTerms($terms, 'name', $i);
        }
      });
    }

    public function states(){
      return $this->hasMany(State::class);
    }

    public function state(){
      return $this->hasOne(State::class);
    }
}
