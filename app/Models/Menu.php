<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    private static $menu;

    public static function createMenu($request){
        self::$menu=new Menu();
        self::$menu->name=$request->name;
        self::$menu->type=$request->type;
        self::$menu->addedby_id=$request->addedby_id;

        self::$menu->save();
    }
    public static function updateMenu($request, $id){
        self::$menu=Menu::find($id);

        self::$menu->name=$request->name;
        self::$menu->type=$request->type;
        self::$menu->editedby_id=$request->editedby_id;

        self::$menu->save();
    }

    public static function deleteMenu($id){
        self::$menu=Menu::find($id);
        self::$menu->delete();
    }
    public function menuPages(){
        return $this->hasMany(MenuPage::class);
    }
}
