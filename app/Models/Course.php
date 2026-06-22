<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Course extends Model
{
    //
    protected $fillable=['name'];
    public function student(){
        return $this->belongsToMany(Student::class);
    }

}
