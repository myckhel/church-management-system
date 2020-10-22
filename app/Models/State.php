<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use Searchable;
    protected $fillable = ['country_id', 'name'];
    protected $searches = [];

    public function users(){
      return $this->hasMany(User::class);
    }
    public function churches(){
      return $this->hasMany(Church::class);
    }

    public static function scopeSearchState($q, $state)
    {
      $terms = stringToTerms($state);
      foreach ($terms as $i => $term) {
        if ($i == 0) $q->where('name', 'LIKE', "%{$term}%");
        else $q->orWhere('name', 'LIKE', "%$term%");
      }
    }

    public function scopeSearch($q, $search, $split = true)
    {
      if ($search) {
        $terms = $split ? stringToTerms($search) : $search;
        if ($split) {
          foreach ($terms as $i => $term) {
            if ($i == 0) $q->where('name', 'LIKE', "%{$term}%");
            else $q->orWhere('name', 'LIKE', "%$term%");
          }
        } else {
          $q->whereLike($terms, 'name');
        }
      }
    }
}
