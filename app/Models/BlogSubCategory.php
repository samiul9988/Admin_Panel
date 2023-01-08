<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogSubCategory extends Model
{
    use HasFactory;
    private static $blog_sub_category;

    public static function createBlogSubCategory($request){
        self::$blog_sub_category=new BlogSubCategory();

        self::$blog_sub_category->blog_category_id=$request->blog_category_id;
        self::$blog_sub_category->name=$request->name;
        self::$blog_sub_category->addedby_id=$request->addedby_id;


        self::$blog_sub_category->save();
    }
    public static function updateBlogSubCategory($request, $id){
        self::$blog_sub_category=BlogSubCategory::find($id);

        self::$blog_sub_category->blog_category_id=$request->blog_category_id;
        self::$blog_sub_category->name=$request->name;
        self::$blog_sub_category->editedby_id=$request->editedby_id;

        self::$blog_sub_category->save();
    }

    public static function deleteBlogSubCategory($id){
        self::$blog_sub_category=BlogSubCategory::find($id);
        self::$blog_sub_category->delete();
    }
    public function blogCategory(){
        return $this->belongsTo(BlogCategory::class,'blog_category_id','id');
    }
    public function blogSubcategoryPosts(){
        return $this->hasMany(BlogSubcategoryPost::class,'blog_subcategory_id','id');
    }
}
