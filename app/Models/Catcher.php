<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catcher extends Model
{
    use HasFactory;
    public static $PENDING = 0;
    public static $PROCESSING = 1;
    public static $COMPLETED = 2;
    public static $FAILED = 3;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
