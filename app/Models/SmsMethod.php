<?php

namespace App\Models;

use App\Traits\HasMeta;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsMethod extends Model
{
    use HasFactory, Searchable, HasMeta;
    protected $fillable = ['sms_client_id', 'name', 'method', 'params'];
    protected $casts    = ['sms_client_id' => 'int', 'params' => 'array'];
    protected $searches = ['name'];

    function client() {
      return $this->belongsTo(SmsClient::class, 'sms_client_id');
    }
}
