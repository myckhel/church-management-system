<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded = ['id'];

    public function getFullname(){

        return "$this->firstname $this->lastname";
        
    }
}
