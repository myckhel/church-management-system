<?php

namespace App\Models;

use App\Traits\HasMeta;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Znck\Eloquent\Traits\BelongsToThrough;

class EventGiving extends Model
{
    use BelongsToThrough, HasFactory, Searchable, HasMeta;
    protected $fillable = ['event_id', 'giving_id', 'amount'];
    protected $casts    = ['event_id' => 'int', 'giving_id' => 'int', 'amount' => 'float'];
    protected $searches = [];

    function getChurchId() {
      return $this->loadMissing('service:services.id,name,church_id')->service->church_id;
    }

    public function event(){
      return $this->belongsTo(Event::class);
    }
    public function giving(){
      return $this->belongsTo(Giving::class);
    }
    public function service(){
      return $this->belongsToThrough(Service::class, Event::class);
    }
}
