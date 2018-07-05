<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $guarded = ['id'];

    public function getTotal(){

        return $this->male + $this->female + $this->children ;
    }
}