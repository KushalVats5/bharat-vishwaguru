<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'jobable_type',
        'jobable_id',
        'user_id',
        'status',
        'description',
        'price',
        'price_type',
        'assigned_to',
        'assigned_by',
    ];

    /**
     * Get all of the models that own jobs.
     */
    public function jobable()
    {
        return $this->morphTo();
    }

    public function freelancer()
    {
        return $this->hasOne('App\User', 'id', 'assigned_to');
    }

    public function assigner()
    {
        return $this->hasOne('App\User', 'id', 'assigned_by');
    }

    public function owner()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    /**
     * Get all of the Job's comments.
     */
    public function jobcomments()
    {
        return $this->morphMany('App\JobComment', 'jobcommentable');
    }
}