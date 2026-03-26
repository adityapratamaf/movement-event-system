<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'event_id',
        'category_id',
        'table_id',
        'name',
        'phone',
        'qr_code',
        'invitation_quota',
        'total_attendees',
        'attendance_status',
        'checkin_at'
    ];
    
    // Relation
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
