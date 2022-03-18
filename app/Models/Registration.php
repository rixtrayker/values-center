<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static $BOOKED = 0;
    public static $PAID = 1;
    public static $DONE = 2;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function eduCenter()
    {
        return $this->belongsTo(EduCenter::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
