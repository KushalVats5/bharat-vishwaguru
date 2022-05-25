<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public $fillable = ['title', 'parent_id', 'category_image'];

    public function childs(){
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function articles(){
        return $this->hasMany(Article::class)->where('post_type', 'article');
    }
    public function latestArticles()
    {
        return $this->hasMany(Post::class)->where('type', 'article')->latest();
    }

    public function videos(){
        return $this->hasMany(Article::class)->where('post_type', 'video');
    }
    public function latestVideos()
    {
        return $this->hasMany(Article::class)->where('type', 'video')->latest();
    }

}
