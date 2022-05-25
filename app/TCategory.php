<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TCategory extends Model
{
    protected $table = 't_categories';

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
