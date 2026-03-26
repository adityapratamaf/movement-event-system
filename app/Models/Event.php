<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // Relation
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }
}
