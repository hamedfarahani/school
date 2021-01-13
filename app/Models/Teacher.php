<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }

    public function student()
    {
        return $this->hasOne(Student::class,'student_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class,'teacher_id');
    }
}
