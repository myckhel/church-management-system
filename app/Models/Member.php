<?php

namespace App\Models;

use App\Traits\HasMeta;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory, Searchable, HasMeta;
    protected $fillable = ['user_id', 'church_id', 'member_since'];
    protected $casts    = [];
    protected $searches = [];


    public function church(){
      return $this->belongsTo(Church::class, 'church_id');
    }
    public function user(){
      return $this->belongsTo(User::class, 'user_id');
    }
    public function groups(){
      return $this->hasMany(Group::class);
    }
}
