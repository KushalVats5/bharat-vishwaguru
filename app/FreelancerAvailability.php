<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreelancerAvailability extends Model
{
    protected $fillable = [
        'user_id',
        'availability',
        'mon_hours',
        'tue_hours',
        'wed_hours',
        'thu_hours',
        'fri_hours',
        'sat_hours',
        'sun_hours',
        'notes',
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}