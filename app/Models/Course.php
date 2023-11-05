<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        "code","description","name"
    ] ;

    public function grades(){
        return $this->hasMany('App\Models\Grade') ;
    }
    public function students(){
        return $this->belongsToMany('App\Models\Student') ;
    }

}