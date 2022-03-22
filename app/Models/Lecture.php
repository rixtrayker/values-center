<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function lectureStudents()
    {
        return $this->hasMany(LectureStudent::class);
    }

    public function attendedStudents()
    {
        return $this->belongsToMany(Student::class, 'attendances', 'lecture_id', 'student_id');
    }
}
