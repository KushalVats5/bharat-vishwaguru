<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobComment extends Model
{
    protected $fillable = [
        'jobcommentable_type',
        'jobcommentable_id',
        'user_id',
        'message',
        'attachments',
        'parent_id',
    ];

    /**
     * Get all of the models that own jobs.
     */
    public function jobcommentable()
    {
        return $this->morphTo();
    }

    public function owner()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}