<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlotBooking extends Model
{

    protected $table = 'slot_booking';

    protected $fillable = [
        'name', 'email', 'slot_date', 'slot_time'
    ];
}
