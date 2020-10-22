<?php

namespace App\Models;

use App\Traits\HasMeta;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, Searchable, HasMeta;
    protected $fillable = ['church_id', 'regular', 'name', 'start', 'duration', 'recurrence'];
    protected $casts    = [];
    protected $searches = [];

    public function church(){
      return $this->belongsTo(Church::class);
    }
    public function events(){
      return $this->hasMany(Event::class);
    }
}
