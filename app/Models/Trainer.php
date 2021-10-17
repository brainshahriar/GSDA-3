<?php

namespace App\Models;
use App\Models\Course;
use App\Models\ClassroomCourse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function course(){

        return $this->belongsTo(Course::class,'course_id');
       }
       public function classroom_course(){

        return $this->belongsTo(ClassroomCourse::class,'classroom_course_id');
       }
}
