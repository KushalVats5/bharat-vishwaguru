<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan_Feature extends Model
{
    protected $fillable = ['plan_id'];
    protected $table = 'plan_feature';
}
