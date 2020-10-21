<?php

namespace App\Traits;

/**
 *
 */
trait Searchable
{
  public function scopeSearch($stmt, $search, $columns = null, $split = true){
    if ($search) {
      $stmt->where(function ($q) use($search, $columns, $split){
        $searches = $columns ?? $this->searches ?? [];
        $terms = $split ? stringToTerms($search) : $search;
        if ($searches) {
          foreach ($searches as $key => $column) {
            if ($split) {
              $q->mapLikeTerms($terms, $column, $key);
            } else {
              $q->whereLike($terms, $column, $key);
            }
          }
        }
      });
    }
  }

  public function scopeWhereLike($q, $term, $column, $index = 0)
  {
    $q->where(fn ($q) => $q->when(
      $index == 0,
      fn ($q) => $q->where($column, "LIKE", "%$term%"),
      fn ($q) => $q->orWhere($column, "LIKE", "%$term%")
    ));
  }

  public function scopeMapLikeTerms($q, $terms, $column, $key=false){
    $q->where(function ($q) use($terms, $column, $key){
      foreach ($terms as $i => $term) {
        $index = $key != false ? $key : $i;
        $q->when(
          $index == 0,
          fn ($q) => $q->where($column, 'LIKE', "%$term%"),
          fn ($q) => $q->orWhere($column, 'LIKE', "%$term%")
        );
      }
    });
  }
}
