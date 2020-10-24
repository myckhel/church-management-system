<?php

namespace App\Models;

use App\Traits\HasMeta;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    use HasFactory, Searchable, HasMeta;
    protected $fillable = ['group_id', 'member_id'];
    protected $casts    = ['group_id' => 'int', 'member_id' => 'int'];
    protected $searches = [];

    public function group(){
      return $this->belongsTo(Group::class);
    }
    public function member(){
      return $this->belongsTo(Member::class);
    }
}
