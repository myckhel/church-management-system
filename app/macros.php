<?php
Illuminate\Http\Request::macro(
  'church',
  fn () => $this->user()->church ?? null
);

\Illuminate\Support\Collection::macro(
  'withUrls',
  function($collections = null, $relations = null){
    $this->map(function ($model) use ($collections, $relations){
      if ($relations) {
        array_walk(
          $relations,
          fn ($collection, $relate) =>
            nestedProp($model, $relate)->withUrls(is_int($collection) ? $collections : $collection
          ),
        );
      }

      if($collections) {
        $model->withUrls($collections);
      }
    });
    return $this;
  }
);

function nestedProp ($model, $relate) {
  $relates = explode('.', $relate);
  $prop = $relates[0];
  $related = $model->$prop;
  if (sizeof($relates) > 1) {
    return nestedProp($related, substr($relate, strpos($relate, '.')+1));
  } else {
    return $related;
  }
}
