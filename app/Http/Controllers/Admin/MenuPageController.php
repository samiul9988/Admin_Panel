<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuPage;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('menu_pages', 'allMenuPages');
        return view('admin.menu-page.index',['menu_pages'=>MenuPage::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        menuSubmenu('menu_pages', 'createMenuPage');
        return view('admin.menu-page.new_create',[
            'all_menus'=>Menu::where('active',1)->get(),
            'all_pages'=>Page::where('active',1)->get(),
            'menu_pages'=>MenuPage::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->all();
        $this->validate($request,[
            'pages_id'=>'required',
            'menus_id'=>'nullable',
        ]);
//        return $request->all();
        MenuPage::createMenuPage($request);
        menuSubmenu('menu_pages', 'createMenuPage');
        return redirect()->route('menu-page.create')->with('success','Successfully Created Menus and Pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        return Page::find($id);
        menuSubmenu('menu_pages', 'createMenuPage');
        return view('admin.menu-page.edit',[
            'page'=>Page::find($id),
            'menus'=>Menu::where('active',1)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        return $request->all();
        MenuPage::updateMenuPage($request,$id);
        menuSubmenu('menu_pages', 'createMenuPage');
        return redirect()->route('menu-page.create')->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
//    public function pageDelete($id)
//    {
//        dd($id);
//        MenuPage::pageDelete($id);
//        return redirect('/menu-page/create/')->with('success','Successfully Deleted');
//    }
    public function pageDelete(Request $request){
        MenuPage::pageDelete($request->id);
        menuSubmenu('menu_pages', 'createMenuPage');
        return response()->json(['msg'=>'Successfully Deleted !','status'=>true]);
    }

    public function page($pageId){
        $page=Page::find($pageId);
        return view('admin.menu-page.page-menus',compact('page'));
//        return $page->menuPages;
    }
    public function menu($menuId){
        $menu=Menu::find($menuId);
        return view('admin.menu-page.menu-pages',compact('menu'));
//        return $page->menuPages;
    }
}
