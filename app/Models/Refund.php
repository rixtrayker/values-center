<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    public static $PENDING = 0;
    public static $DONE = 1;

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
