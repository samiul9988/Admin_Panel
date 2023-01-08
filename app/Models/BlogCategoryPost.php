<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategoryPost extends Model
{
    use HasFactory;
    private static $blog_category_post, $blog_category_posts,$blog_subcategory_posts, $blog_subcategory_post;

    public static function createBlogCategoryPost($request)
    {
        if ($request->blog_category_ids) {
            foreach ($request->blog_category_ids as $blog_category_id) {

                    self::$blog_category_post = new BlogCategoryPost();

                    self::$blog_category_post->blog_category_id = $blog_category_id;
                    self::$blog_category_post->blog_post_id =$request->blog_post_id;

                    self::$blog_category_post->save();

            }
        }

        if ($request->blog_subcategory_ids) {
            foreach ($request->blog_subcategory_ids as $blog_subcategory_id) {

                    self::$blog_subcategory_post = new BlogSubcategoryPost();

                    self::$blog_subcategory_post->blog_subcategory_id = $blog_subcategory_id;
                    self::$blog_subcategory_post->blog_post_id =$request->blog_post_id;

                    self::$blog_subcategory_post->save();
            }
        }
    }

    public static function updateBlogCategoryPost($request, $id)
    {
        if($request->blog_category_ids){
            self::$blog_category_posts = BlogCategoryPost::where('blog_post_id', $id )->get();
            $add_blog_category_ids=[];
            foreach (self::$blog_category_posts as $blog_category_post) {
                if ($blog_category_post->blog_post_id == $id) {
                    if (in_array( $blog_category_post->blog_category_id, $request->blog_category_ids )) {
                        array_push( $add_blog_category_ids, $blog_category_post->blog_category_id );
                    }
                    else{
                        self::deleteBlogCategoryPost($blog_category_post->id);
                    }
                }
            }

            foreach ($request->blog_category_ids as $blog_category_id){
                if(in_array( $blog_category_id, $add_blog_category_ids )){

                }
                else{
                    self::$blog_category_post = new BlogCategoryPost();

                    self::$blog_category_post->blog_category_id = $blog_category_id;
                    self::$blog_category_post->blog_post_id = $id;
                    self::$blog_category_post->save();
                }
            }
        }

        if($request->blog_subcategory_ids){
            self::$blog_subcategory_posts = BlogSubcategoryPost::where('blog_post_id', $id )->get();
            $add_blog_subcategory_ids=[];
            foreach (self::$blog_subcategory_posts as $blog_subcategory_post) {
                if ($blog_subcategory_post->blog_post_id == $id) {
                    if (in_array( $blog_subcategory_post->blog_subcategory_id, $request->blog_subcategory_ids )) {
                        array_push( $add_blog_subcategory_ids, $blog_subcategory_post->blog_subcategory_id );
                    }
                    else{
                        self::deleteBlogSubcategoryPost($blog_subcategory_post->id);
                    }
                }
            }

            foreach ($request->blog_subcategory_ids as $blog_subcategory_id){
                if(in_array( $blog_subcategory_id, $add_blog_subcategory_ids )){

                }
                else{
                    self::$blog_subcategory_post = new BlogSubcategoryPost();

                    self::$blog_subcategory_post->blog_subcategory_id = $blog_subcategory_id;
                    self::$blog_subcategory_post->blog_post_id = $id;
                    self::$blog_subcategory_post->save();
                }
            }
        }

    }
    public static function deleteBlogSubcategoryPost($id){
        self::$blog_subcategory_post=BlogSubcategoryPost::find($id);
        self::$blog_subcategory_post->delete();
    }

    public static function deleteBlogCategoryPost($id){
        self::$blog_category_post=BlogCategoryPost::find($id);
        self::$blog_category_post->delete();
    }
    public function blogCategory(){
        return $this->belongsTo(BlogCategory::class,'blog_category_id','id');
    }
    public function blogCategories(){
        return $this->belongsToMany(BlogCategory::class,'blog_category_posts','blog_category_id','id');
    }

    public function blogPosts(){
        return $this->hasMany(BlogPost::class,'id','blog_post_id');
//        return $this->belongsToMany(BlogPost::class,'blog_posts','blog_post_id','id');
    }
    public function hasBlogPost($blogPost_id){
        return (bool) $this->blogPosts()->where('id',$blogPost_id)->count();
    }
    public static function deleteBlogPostId($id){


        self::$blog_category_posts=BlogCategoryPost::all();
        foreach (self::$blog_category_posts as $blog_category_post){
            if($blog_category_post->blog_post_id==$id){
                self::$blog_category_post=BlogCategoryPost::find($blog_category_post->id);
                self::$blog_category_post->delete();
            }
        }
        self::$blog_subcategory_posts=BlogSubcategoryPost::all();
        foreach (self::$blog_subcategory_posts as $blog_subcategory_post){
            if($blog_subcategory_post->blog_post_id==$id){
                self::$blog_subcategory_post=BlogSubcategoryPost::find($blog_subcategory_post->id);
                self::$blog_subcategory_post->delete();
            }
        }

    }

}
