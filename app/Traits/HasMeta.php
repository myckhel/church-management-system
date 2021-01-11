<?php
namespace App\Traits;

use App\Meta;

/**
 *
 */
trait HasMeta
{
  public function addMeta($metas, $check = []){
    $meta = $this->metas()->updateOrCreate($check, $metas);
    $this->load('metas');
    return $meta;
  }

  public function addMetas($metas, $name, $value, $callback = false){
    $metas = $this->load(['metas' => function($q) use($name){
      $q->where('name', $name)->latest();
    }]);

    if (count($metas->metas) > 0) {
        $option = $metas->metas->first();
        $option->value = $value;
        $option->save();
    } else {
      $this->metas()->create([
        'name' => $name,
        'value' => $value,
      ]);
    }
    if($callback) $callback($this);
    return $this;
  }

  public function metas(){
    return $this->morphMany(Meta::class, 'metable');
  }

  public function scopeMetas($stmt, $metas = []){
    if ($metas) {
      $stmt->with(['metas' => function($q) use($metas){
        $q->whereIn('name', $metas);
      }]);
    } else {
      $stmt->with(['metas']);
    }

    return $stmt;
  }

  private function isAssoc(array $arr){
    if (array() === $arr) return false;
    return array_keys($arr) !== range(0, count($arr) - 1);
  }

  public function withMetas(Array $metas = [], $select = ['name', 'value', 'type']){
    $metas = $this->metas()->select($select)->where(function ($q) use($metas){
      if ($metas) {
        if ($this->isAssoc($metas)) {
          // $q->whereIn('name', $metas);
        } else {
          $q->whereIn('name', $metas);
        }
      } else {}
    })->get();

    $obj = new \stdClass();
    $metas->map(function ($meta) use(&$obj){
      $name = $meta->name;
      // if ($meta->type) {
      //   $type = $meta->type;
      //   if (!isset($obj->$type)) {
      //     $obj->$type = new \stdClass();
      //   }
      //   $obj->$type->$name = $meta->value;
      // } else {
        $obj->$name = $meta->value;
      // }
    });

    $this->metas = $obj;

    return $this;
  }

  public function updateMetas($name, $value, $type = null){
    return $this->metas()->updateOrCreate(['name' => $name, 'type' => $type], ['name' => $name, 'value' => $value, 'type' => $type]);
  }

  public static function updateSetting(User $user, $name, $value, $callback = false){
    $settings = $user->load(['settings' => function($q) use($name){
      $q->where('name', $name)->latest();
    }]);

    if (count($settings->settings) > 0) {
      // return [$settings];
        $option = $settings->settings[0];
        $option->value = $value;
        $option->save();
    } else {
      $user->settings()->create([
        'name' => $name,
        'value' => $value,
      ]);
    }
    if($callback) $callback($user);
    return $user->myDetails();
  }

  public static function getSettings($user, $name){
    return $user->load(['settings' => function($q) use($name){
      $q->where('name', $name)->latest();
    }]);
  }

  public static function bootHasMedia()
  {
    static::deleting(function ($model) {
      if (in_array(SoftDeletes::class, class_uses_recursive($model))) {
          if (! $model->forceDeleting) {
              return;
          }
      }

      $model->metas()->cursor()->each(fn (Meta $meta) => $meta->delete());
    });
  }
}
