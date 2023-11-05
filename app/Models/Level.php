<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    protected $fillable = [
        "name","number","description",
    ] ;

    public function students(){
        return $this->hasMany('App\Models\Student');

    }
}