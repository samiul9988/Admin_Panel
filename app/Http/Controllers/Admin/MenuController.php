<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('menus', 'allMenus');
        return view('admin.menu.index',['menus'=>Menu::all()]);
    }

    public function menuActive(Request $request){
        if($request->mode=='true'){
            DB::table('menus')->where('id',$request->id)->update(['active'=>1]);
        }
        else{
            DB::table('menus')->where('id',$request->id)->update(['active'=>0]);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        menuSubmenu('menus', 'createMenu');
        return view('admin.menu.create');
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
            'name'=>'string|required',
            'type'=>'string|required',
        ]);
        Menu::createMenu($request);
        menuSubmenu('menus', 'createMenu');
        return redirect()->route('menu.create')->with('success','Menu Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        menuSubmenu('menus', 'allMenus');
        return view('admin.menu.view',['menu'=>Menu::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        menuSubmenu('menus', 'allMenus');
        return view('admin.menu.edit',['menu'=>Menu::find($id)]);
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
        $this->validate($request,[
            'name'=>'string|required',
            'type'=>'string|required',
        ]);
        Menu::updateMenu($request,$id);
        menuSubmenu('menus', 'allMenus');
        return redirect()->route('menu.index')->with('success','Menu Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Menu::deleteMenu($id);
        menuSubmenu('menus', 'allMenus');
        return redirect()->route('menu.index')->with('success','Menu Deleted Successfully');
    }

    public function pages($menuId){
        return view('admin.page.index',['menu'=>Menu::find($menuId)]);
    }
}
