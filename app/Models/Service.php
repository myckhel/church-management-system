<?php

namespace App\Models;

use App\Traits\HasMeta;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Service extends Model
{
    use HasFactory, Searchable, HasMeta;
    protected $fillable = ['church_id', 'is_global', 'regular', 'name', 'start', 'duration', 'recurrence'];
    protected $casts    = ['recurrence' => 'array', 'church_id' => 'int', 'is_global' => 'bool', 'regular' => 'bool', 'duration' => 'int'];
    protected $searches = [];

    public function makeEvent() {
      $start = $this->start;
      $start = isset($this->recurrence['day'])
        ? Carbon::now()->setTime($start->hour, $start->minute, $start->second)->weekDay($this->recurrence['day'])
        : $this->start;

      return $this->events()->create([
        'start_at'  => $start,
        'end_at'    => Carbon::parse($start)->add('mins', $this->duration),
      ]);
    }

    public function church(){
      return $this->belongsTo(Church::class);
    }
    public function events(){
      return $this->hasMany(Event::class);
    }
}
