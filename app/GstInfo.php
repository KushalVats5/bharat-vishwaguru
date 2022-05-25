<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GstInfo extends Model
{
    protected $fillable = [
        'gst_no',
        'firm_name',
        'owner_name',
        'gst_username',
        'gst_passcode',
        'flat_no',
        'premises',
        'street',
        'locality',
        'city',
        'state',
        'zipcode',
        'email_id',
        'phone_no',
        'bank_ac_number',
        'bank_ifsc',
        'bank_name',
        'user_id',
    ];

    public function city_name()
    {
        return $this->hasOne('App\City', 'id', 'city');
    }

    public function state_name()
    {
        return $this->hasOne('App\State', 'id', 'state');
    }

}