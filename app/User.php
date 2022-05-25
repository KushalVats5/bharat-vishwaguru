<?php

namespace App;

use App\Article;
use App\UserPayment;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password','mobile','avatar','ward_no'
    // ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gcCaptures()
    {
        return $this->hasMany('App\Capturegc');
    }

    public static function userCount()
    {
        return User::count();
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(UserPayment::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function available()
    {
        return $this->hasOne(FreelancerAvailability::class);

        //return $this->hasOne('App\FreelancerAvailability', 'id', 'user_id');
    }

}