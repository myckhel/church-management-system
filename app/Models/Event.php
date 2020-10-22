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

    public function service(){
      return $this->belongsTo(Service::class);
    }
}
