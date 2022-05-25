<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItrSource extends Model
{
    protected $fillable = [
        'user_id',
        'income_sources',
        'form_16',
        'financial_year',
        'pan_number',
        'aadhar_number',
    ];
}