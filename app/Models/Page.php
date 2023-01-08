<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    private static $page;

    public static function createPage($request){
        self::$page=new Page();
        self::$page->name=$request->name;
        self::$page->excerpt=$request->excerpt;
        self::$page->addedby_id=$request->addedby_id;

        self::$page->save();
    }
    public static function updatePage($request, $id){
        self::$page=Page::find($id);

        self::$page->name=$request->name;
        self::$page->excerpt=$request->excerpt;
        self::$page->editedby_id=$request->editedby_id;

        self::$page->save();
    }

    public static function deletePage($id){
        self::$page=Page::find($id);
        self::$page->delete();
    }
    public function menuPages(){
        return $this->hasMany(MenuPage::class);
    }
    public function menuPage(){
        return $this->belongsTo(MenuPage::class);
    }
    public function pageItems(){
        return $this->hasMany(PageItem::class,'page_id','id');
    }
}
