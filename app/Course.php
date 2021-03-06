<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    public function field()
    {
        return $this->belongsTo('App\Field');
    }

    public function galleries()
    {
        return  $this->hasMany('App\Gallery');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\Teacher', 'teacher_courses');
    }
}
