<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogSubcategoryPost extends Model
{
    use HasFactory;

    public function blogSubcategories(){
        return $this->belongsToMany(BlogCategory::class,'blog_subcategory_posts','blog_subcategory_id','id');
    }

//    public function blogPosts(){
//        return $this->belongsToMany(BlogPost::class,'blog_posts','blog_post_id','id');
//    }

    public function blogPosts(){
        return $this->hasMany(BlogPost::class,'id','blog_post_id');
//        return $this->belongsToMany(BlogPost::class,'blog_posts','blog_post_id','id');
    }
    public function hasBlogPost($blogPost_id){
        return (bool) $this->blogPosts()->where('id',$blogPost_id)->count();
    }
}
