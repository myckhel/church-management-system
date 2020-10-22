<?php

namespace App\Models;

use App\Traits\HasMeta;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory, Searchable, HasMeta;
    protected $fillable = ['event_id', 'male', 'female', 'children'];
    protected $casts    = [];
    protected $searches = [];

    public function event(){
      return $this->belongsTo(Event::class);
    }
}
