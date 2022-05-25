<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\UserPayment;

class Plan extends Model
{
    //
    protected $table = "plans";

    public function linkToFeatures(){
        return $this->belongsToMany('App\Feature','plan_feature', 'plan_id','feature_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function userPlans(){
        return $this->hasMany(UserPayment::class,'user_plan_id', 'id');
    }
    
}
