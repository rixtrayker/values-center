<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authenticates extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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
