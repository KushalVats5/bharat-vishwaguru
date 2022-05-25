<?php

namespace App\ServicePlans;

use Illuminate\Database\Eloquent\Model;

class SelfEmployed extends Model
{
    protected $fillable = ['requirments'];

    protected $table = 'self_employed';
}
