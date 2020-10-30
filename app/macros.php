<?php
Illuminate\Http\Request::macro(
  'church',
  fn () => $this->user()->church ?? null
);

\Illuminate\Support\Collection::macro(
  'withUrls',
  function($collections, $relations = null){
    $this->map(function ($model) use ($collections, $relations){
      if ($relations) {
        array_map(fn ($relate) => $model->$relate->withUrls($collections), $relations);
      } else {
        $model->withUrls($collections);
      }
    });
    return $this;
  }
);
