<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItrPersonalDetail extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'father_name',
        'date_of_birth',
        'phone',
        'email',
        'gender',
        'pincode',
        'country',
        'state',
        'city',
        'flat_door_building',
        'premises_building_village',
        'road',
        'locality',
        'employee_category',
        'itr_sources_id',
    ];

}