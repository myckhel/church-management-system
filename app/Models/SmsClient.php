<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsClient extends Model
{
    use HasFactory, Searchable;
    protected $fillable = ['name', 'church_id', 'endpoint', 'auth_type', 'auth', 'is_primary', 'is_global'];
    protected $casts    = ['church_id' => 'int', 'auth' => 'array', 'is_global' => 'bool', 'is_primary' => 'bool'];
    protected $searches = ['name'];

    function church() {
      return $this->belongsTo(Church::class);
    }

    function methods() {
      return $this->hasMany(SmsMethod::class, 'sms_client_id');
    }
}
