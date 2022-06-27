<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    protected $table = 'post_views';

    /**
     * Write Your Code..
     *
     * @return string
     */
    public function article()
    {
        return $this->belongsTo(Article::class, 'id_post');
    }
}
