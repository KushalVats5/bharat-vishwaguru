<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicePlan extends Model
{
    protected $fillable = [
        'title',
        'description',
        'duration',
        'duration_unit',
        'price',
        'service_type',
        'status',
    ];
}