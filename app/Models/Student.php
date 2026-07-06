<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
class Student extends Model
{
    //
    protected $fillable=['name'
    ,'signup_id'];
    public function courses(){
        return $this->belongsToMany(Course::class,
        'course_student',
        'student_id',
        'course_id');
    }
}
