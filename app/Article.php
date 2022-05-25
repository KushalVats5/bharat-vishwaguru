<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;
use App\User;

class Article extends Model
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'sub_heading', 'meta_key', 'short_description','meta_description', 'content', 'featured_image'
    ];

    // protected $guarded = [];

    public static function boot()
{
    parent::boot();

    // registering a callback to be executed upon the creation of an activity AR
    static::creating(function($activity) {

        // produce a slug based on the activity title
        $slug = \Str::slug($activity->title);

        // check to see if any other slugs exist that are the same & count them
        $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

        // if other slugs exist that are the same, append the count to the slug
        $activity->slug = $count ? "{$slug}-{$count}" : $slug;

    });


}

    public function gcCaptures()
    {
        return $this->hasMany('App\Capturegc');
    }
    public function author($id)
    {
        $user = User::find($id);
        $name = $user->title;
        return $name;
    }

    public static function pageCount()
    {
        return Page::count();
    }

    public function category(){
        return $this->belongsToMany(Category::class, 'article_category', 'article_id', 'category_id');
    }
}