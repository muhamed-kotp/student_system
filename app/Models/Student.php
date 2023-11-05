<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        "name", "code", "date", "email", "level_id",
    ];
    public function courses()
    {
        return $this->belongsToMany('App\Models\Course');
    }
    public function grades()
    {
        return $this->belongsToMany('App\Models\Grade');

    }
    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }
}
