<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestLog extends Model
{
    protected $fillable = [
        'guest_id',
        'checkin_time',
        'total_attendees',
        'method'
    ];
}
