<?php

namespace App\Models;

use App\Traits\HasMeta;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory, Searchable, HasMeta;
    protected $fillable = ['service_id', 'start_at', 'end_at'];
    protected $casts    = [];
    protected $searches = [];

    function getChurchId() {
      return $this->loadMissing('service:id,name,church_id')->service->church_id;
    }

    public function service(){
      return $this->belongsTo(Service::class);
    }
    public function attendances(){
      return $this->hasMany(Attendance::class);
    }
}
