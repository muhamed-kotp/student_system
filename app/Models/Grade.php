<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        "name","maxDegree", "catgory_id"
    ] ;


    public function students(){
        return $this->belongsToMany('App\Models\Student') ;
    }
    public function course(){
        return $this->belongsTo('App\Models\Course') ;
    }

}