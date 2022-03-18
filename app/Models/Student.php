<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function authenticates()
    {
        return $this->hasMany(Authenticates::class);
    }

    public function catcher()
    {
        return $this->hasOne(Catcher::class);
    }

    public function eduCenter()
    {
        return $this->belongsTo(EduCenter::class);
    }

    public function lectures()
    {
        return $this->belongsToMany(Lecture::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function attendedLectures()
    {
        return $this->belongsToMany(Lecture::class, 'attendances', 'student_id', 'lecture_id');
    }
}
