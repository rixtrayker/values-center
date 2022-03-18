<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EduCenter extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function authenticates()
    {
        return $this->hasMany(Authenticates::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
