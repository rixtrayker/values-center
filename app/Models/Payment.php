<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static $PENDING = 0;
    public static $DONE = 1;
    public static $REFUNDED = 2;

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public function authenticate()
    {
        return $this->belongsTo(Authenticates::class);
    }

    public function eduCenter()
    {
        return $this->belongsTo(EduCenter::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function studentLecture()
    {
        return $this->hasMany(LectureStudent::class);
    }

    public function refund()
    {
        return $this->hasOne(Refund::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
