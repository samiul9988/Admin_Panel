<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    private static $blog_category;

    public static function createBlogCategory($request){
        self::$blog_category=new BlogCategory();
        self::$blog_category->name=$request->name;
        self::$blog_category->addedby_id=$request->addedby_id;


        self::$blog_category->save();
    }
    public static function updateBlogCategory($request, $id){
        self::$blog_category=BlogCategory::find($id);
        self::$blog_category->name=$request->name;
        self::$blog_category->editedby_id=$request->editedby_id;

        self::$blog_category->save();
    }

    public static function deleteBlogCategory($id){
        self::$blog_category=BlogCategory::find($id);
        self::$blog_category->delete();
    }
    public function blogSubcategories(){
        return $this->hasMany(BlogSubCategory::class,'blog_category_id','id');
    }
    public function blogCategoryPosts(){
        return $this->hasMany(BlogCategoryPost::class,'blog_category_id','id');
    }
}
