<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;

class Page extends Model
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

    public function gcCaptures()
    {
        return $this->hasMany('App\Capturegc');
    }

    public static function pageCount()
    {
        return Page::count();
    }

    public function setSlugAttribute($value)
    {

        if (static::whereSlug($slug = Str::slug($value))->exists()) {

            $slug = $this->incrementSlug($slug);
        }
        // dd($slug);
        $this->attributes['slug'] = $slug;
    }


    /**
     * Set the proper slug attribute
     *
     * @param string $value
     */
    /* public function setSlugAttribute($value)
    {

        if (static::whereSlug($slug = Str::slug($value))->exists()) {
            $slug = "{$slug}-{$this->id}";
        }
        // dd($value, $slug);
        $this->attributes['slug'] = $slug;
    } */

    public function incrementSlug($slug)
    {

        $original = $slug;

        $count = 2;

        while (static::whereSlug($slug)->exists()) {

            $slug = "{$original}-" . $count++;
        }

        return $slug;
    }
}