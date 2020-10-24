<?php

namespace App\Models;

use App\Traits\HasMeta;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory, Searchable, HasMeta;
    protected $fillable = ['church_id', 'name'];
    protected $casts    = ['church_id' => 'int'];
    protected $searches = [];

    public function church(){
      return $this->belongsTo(Church::class);
    }
    public function members(){
      return $this->hasMany(Member::class);
    }
}
