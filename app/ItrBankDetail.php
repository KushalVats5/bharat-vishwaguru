<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItrBankDetail extends Model
{
    protected $fillable = [
        'bank_info',
        'aadhar_info',
        'itr_sources_id',
    ];
}