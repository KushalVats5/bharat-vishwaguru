<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Plan;

class UserPayment extends Model
{
    protected $guarded = [];
    //protected $fillable = ['order_id', 'tracking_id', 'bank_ref_no'];
    protected $table = 'userpayment';


    public function username(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function planname(){
        return $this->hasOne(Plan::class,'id', 'user_plan_id');
    }
    public function plan(){
        return $this->belongsTo(Plan::class,'user_plan_id', 'id');
    }
   
}
