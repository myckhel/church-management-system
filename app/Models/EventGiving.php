<?php

namespace App\Models;

use App\Traits\HasMeta;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventGiving extends Model
{
    use HasFactory, Searchable, HasMeta;
    protected $fillable = ['event_id', 'giving_id', 'amount'];
    protected $casts    = ['event_id' => 'int', 'giving_id' => 'int'];
    protected $searches = [];

    public function event(){
      return $this->belongsTo(Event::class);
    }
    public function giving(){
      return $this->belongsTo(Giving::class);
    }
}
