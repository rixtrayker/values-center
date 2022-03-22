<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectureStudent extends Model
{
    use HasFactory;

    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
