<?php

namespace App\Models;

use App\Traits\HasMeta;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giving extends Model
{
    use HasFactory, Searchable, HasMeta;
    protected $fillable = ['church_id', 'name', 'is_global'];
    protected $casts    = ['is_global' => 'bool', 'church_id' => 'int'];
    protected $searches = [];

    public function eventGivigs(){
      return $this->hasMany(EventGiving::class);
    }
    public function church(){
      return $this->belongsTo(Church::class);
    }
}
