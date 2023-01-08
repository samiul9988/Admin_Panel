<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class PageItem extends Model
{
    use HasFactory;
    private static $page_item;

    public static function createPageItem($request){
        self::$page_item=new PageItem();
        self::$page_item->page_id=$request->page_id;
        self::$page_item->name=$request->name;

        if(Session::get('page_id')){
            if($request->active){
                self::$page_item->active=$request->active;
            }else{
                self::$page_item->active=0;
            }

            if($request->editor){
                self::$page_item->editor=$request->editor;
            }else{
                self::$page_item->editor=0;
            }
        }



        self::$page_item->description=$request->description;
        self::$page_item->addedby_id=$request->addedby_id;

        self::$page_item->save();
    }
    public static function updatePageItem($request, $id){
        self::$page_item=PageItem::find($id);

        self::$page_item->page_id=$request->page_id;
        self::$page_item->name=$request->name;
        self::$page_item->description=$request->description;
        self::$page_item->editedby_id=$request->editedby_id;

        self::$page_item->save();
    }

    public static function deletePageItem($id){
        self::$page_item=PageItem::find($id);
        self::$page_item->delete();
    }
    public function page(){
        return $this->belongsTo(Page::class);
    }
}
