<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public static $PENDING = 0;
    public static $DONE = 1;
    public static $REFUNDED = 2;

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

    public function lectures()
    {
        return $this->belongsToMany(Lecture::class);
    }

    public function refund()
    {
        return $this->hasOne(Refund::class);
    }
}
