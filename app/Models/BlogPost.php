<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    private static $featureImage,$featureImageName,$directory,$featureImageUrl,$featureImageExtension;
    private static $blogPost;

    public static function getImageUrl($request){
        if($request->file('feature_image')){
            self::$featureImage=$request->file('feature_image');
            self::$featureImageExtension=self::$featureImage->getClientOriginalExtension();
            self::$featureImageName=time().'.'.self::$featureImageExtension;
            self::$directory='admin/images/blog-post/';
            self::$featureImage->move(self::$directory,self::$featureImageName);
            return self::$directory.self::$featureImageName;
        }
        else{
            return "";
        }

    }

    public static function createBlogPost($request){
        self::saveBasicInfo(new BlogPost(),$request,self::getImageUrl($request));
    }

    public static function saveBasicInfo($blogPost,$request,$getImage){
        $blogPost->title=$request->title;
        $blogPost->excerpt=$request->excerpt;
        $blogPost->description=$request->description;
        $blogPost->tags=$request->tags;

        if($request->addedby_id){
            $blogPost->addedby_id=$request->addedby_id;
        }

        if($request->editedby_id){
            $blogPost->editedby_id=$request->editedby_id;
        }

        if($request->status){
            $blogPost->status=$request->status;
        }

        $blogPost->feature_image=$getImage;

        $blogPost->save();
    }

    public static function updateBlogPost($request,$id){
        self::$blogPost=BlogPost::find($id);
        if ($request->file('feature_image')){
            if (file_exists(self::$blogPost->feature_image)){
                unlink(self::$blogPost->feature_image);
            }
            self::$featureImageUrl=self::getImageUrl($request);
        }
        else{
            self::$featureImageUrl=self::$blogPost->feature_image;
        }

        self::saveBasicInfo(self::$blogPost,$request,self::$featureImageUrl);
    }
    public static function deleteBlogPost($id){
        self::$blogPost=BlogPost::find($id);
        if(file_exists(self::$blogPost->feature_image)){
            unlink(self::$blogPost->feature_image);
        }
        self::$blogPost->delete();
    }

    public static function viewCount($id){
        self::$blogPost=BlogPost::find($id);
        self::$blogPost->view_count=self::$blogPost->view_count+1;
        self::$blogPost->save();
    }

    public function blogCategoryPosts()
	{
		return $this->hasMany(BlogCategoryPost::class, 'blog_post_id', 'id');
//        return $this->belongsToMany(BlogPost::class, 'blog_category_posts', 'blog_post_id', 'id');
	}
    public function hasBlogCategoryPost($blogPosts){
        return (bool) $this->blogCategoryPosts()->where('blog_post_id',$blogPosts)->count();

    }
	public function blogSubcategoryPosts()
	{
        return $this->hasMany(BlogSubcategoryPost::class, 'blog_post_id', 'id');
//		return $this->belongsToMany(BlogPost::class, 'blog_subcategory_posts', 'blog_post_id', 'id');
	}
    public function hasBlogSubcategoryPost($blogPosts){
        return (bool) $this->blogSubcategoryPosts()->where('blog_post_id',$blogPosts)->count();
    }
}
