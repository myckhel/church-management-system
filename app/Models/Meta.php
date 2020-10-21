<?php

namespace App\Models;

use App\Traits\HasMeta;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Collection;

class Meta extends Model
{
    use HasFactory, Searchable;
    protected $searches = [];
    protected $fillable = ['name', 'value', 'type'];
    protected $valid_names = [];

    public function metable(): MorphTo{
      return $this->morphTo();
    }

    public function newCollection(array $models = Array()){
      return new Metas($models);
    }
}


class Metas extends Collection {
 public function keyValue()
 {
   $metas = $this->items;
   $meta = [];
   foreach ($metas as $value) {
     $name = $value->name;
     $meta[$name] = $value['value'];
   }
   $this->items = $meta;
   return $meta;
 }
}
