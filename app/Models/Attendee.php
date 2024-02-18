<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function  event() {
        return $this->belongsTo(Event::class); // belongs to is a one-to-many relationship, it means that an attendee can belong to only one event
    }
}
