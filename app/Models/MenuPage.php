<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPage extends Model
{
    use HasFactory;

    private static $menu_page, $menu_pages;

    public static function createMenuPage($request)
    {
        self::$menu_page = new MenuPage();

        if (isset( $request->menus_id )) {
            foreach ($request->pages_id as $page_id) {
                foreach ($request->menus_id as $menu_id) {
                    self::$menu_page = new MenuPage();
                    if($request->active){
                        self::$menu_page->active = $request->active;
                    }else{
                        self::$menu_page->active = 0;
                    }
                    if($request->title_hide){
                        self::$menu_page->title_hide = $request->title_hide;
                    }else{
                        self::$menu_page->title_hide = 0;
                    }

                    self::$menu_page->page_id = $page_id;
                    self::$menu_page->menu_id = $menu_id;
                    self::$menu_page->addedby_id = $request->addedby_id;

                    self::$menu_page->save();
                }
            }
//             foreach($request->menus as $menu)
//             {
//                 $c = MenuPage::where('menu_id',$menu)
//                 ->where('page_id',$page->id)
//                 ->first();
//                 if(!$c)
//                 {
//                    $c = new MenuPage;
//                    $c->menu_id = $menu;
//                    $c->page_id = $page->id;
//                    $c->addedby_id = Auth::id();
//                    $c->save();
//                 }
//             }
        } else {
            foreach ($request->pages_id as $page_id) {

                self::$menu_page = new MenuPage();

                if($request->active){
                    self::$menu_page->active = $request->active;
                }else{
                    self::$menu_page->active = 0;
                }
                if($request->title_hide){
                    self::$menu_page->title_hide = $request->title_hide;
                }else{
                    self::$menu_page->title_hide = 0;
                }

                self::$menu_page->page_id = $page_id;
                self::$menu_page->addedby_id = $request->addedby_id;

                self::$menu_page->save();

            }
        }

//        self::$menu_page->page_id=$request->page_id;
//        self::$menu_page->menu_id=$request->menu_id;
//        self::$menu_page->addedby_id=$request->addedby_id;
//
//        self::$menu_page->save();
    }

    public static function updateMenuPage($request, $id)
    {
        self::$menu_pages = MenuPage::where( 'page_id', $id )->get();
//        dd($request->menus_id);
//        dd(self::$menu_pages);
        $add_menu_id=[];
        foreach (self::$menu_pages as $menuPage) {
            if ($menuPage->page_id == $id) {
                if (in_array( $menuPage->menu_id, $request->menus_id )) {
                    array_push( $add_menu_id, $menuPage->menu_id );
                    self::$menu_page = MenuPage::find( $menuPage->id);
                    if($request->active){
                        self::$menu_page->active = $request->active;
                    }else{
                        self::$menu_page->active = 0;
                    }
                    if($request->title_hide){
                        self::$menu_page->title_hide = $request->title_hide;
                    }else{
                        self::$menu_page->title_hide = 0;
                    }
                    self::$menu_page->editedby_id = $request->editedby_id;
                    self::$menu_page->save();
                }
                else{
//                    dd($menuPage->id);
                    self::deleteMenuPage($menuPage->id);
                }
            }
        }

        foreach ($request->menus_id as $menu_id){
            if(in_array( $menu_id, $add_menu_id )){

            }
            else{
                self::$menu_page = new MenuPage();
                if($request->active){
                    self::$menu_page->active = $request->active;
                }else{
                    self::$menu_page->active = 0;
                }
                if($request->title_hide){
                    self::$menu_page->title_hide = $request->title_hide;
                }else{
                    self::$menu_page->title_hide = 0;
                }
                self::$menu_page->page_id = $id;
                self::$menu_page->menu_id = $menu_id;
                self::$menu_page->addedby_id = $request->editedby_id;
                self::$menu_page->editedby_id = $request->editedby_id;

                self::$menu_page->save();
            }
        }



//            foreach ($request->menus_id as $menu_id) {
//
//                if ($menuPage->menu_id == $menu_id) {
//                    self::$menu_page = MenuPage::find( $menuPage->id );
//                    self::$menu_page->editedby_id = $request->editedby_id;
//                    self::$menu_page->save();
//                } else {
//                    self::$menu_page = new MenuPage();
//                    self::$menu_page->page_id = $id;
//                    self::$menu_page->menu_id = $menu_id;
//                    self::$menu_page->addedby_id = $request->editedby_id;
//                    self::$menu_page->editedby_id = $request->editedby_id;
//
//                    self::$menu_page->save();
//
//                }
////                    $menu_page=MenuPage::where('page_id',$id)->first();
////                    dd($menu_page->id);
////                    self::$menu_page=MenuPage::find($menu_page->id);
////                    self::$menu_page->menu_id=$menu_id;
////                    self::$menu_page->editedby_id=$request->editedby_id;
////
////                    self::$menu_page->save();


    }

    public static function deleteMenuPage($id){
        self::$menu_page=MenuPage::find($id);
        self::$menu_page->delete();
    }
    public function page(){
        return $this->belongsTo(Page::class);
    }

    public function menu(){
        return $this->belongsTo(Menu::class);
    }

    public static function pageDelete($id){
        self::$menu_pages=MenuPage::all();
        foreach (self::$menu_pages as $menu_page){
            if($menu_page->page_id==$id){
                self::$menu_page=MenuPage::find($menu_page->id);
                self::$menu_page->delete();
            }
        }

    }

}
