<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSaveItems extends Model
{
    protected $fillable = ['user_id', 'item_ids'];

    protected $table = "user_save_items";
}
