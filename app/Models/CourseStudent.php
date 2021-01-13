<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Pivot
{
    public function courses()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
