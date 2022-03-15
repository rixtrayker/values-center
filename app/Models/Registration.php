<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    public static $BOOKED = 0;
    public static $PAID = 1;
    public static $DONE = 2;
}
