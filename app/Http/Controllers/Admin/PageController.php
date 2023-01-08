<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Page;
use App\Models\PageItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('pages', 'allPages');
        return view('admin.page.index',['pages'=>Page::all()]);

    }
    public function pageActive(Request $request){
        if($request->mode=='true'){
            DB::table('pages')->where('id',$request->id)->update(['active'=>1]);
        }
        else{
            DB::table('pages')->where('id',$request->id)->update(['active'=>0]);
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
        menuSubmenu('pages', 'createPage');
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'string|required',
            'excerpt'=>'string|required',
        ]);
        Page::createPage($request);
        menuSubmenu('pages', 'createPage');
        return redirect()->route('page.create')->with('success','Page Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        menuSubmenu('pages', 'allPages');
        return view('admin.page.view',['page'=>Page::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        menuSubmenu('pages', 'allPages');
        return view('admin.page.edit',['page'=>Page::find($id)]);
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
            'excerpt'=>'string|required',
        ]);
        Page::updatePage($request,$id);
        menuSubmenu('pages', 'allPages');
        return redirect()->route('page.index')->with('success','Page Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::deletePage($id);
        menuSubmenu('pages', 'allPages');
        return redirect()->route('page.index')->with('success','Page Deleted Successfully');

    }
    public function pageItems($pageId){
        if(Session::get('page_id')){
            Session::forget('page_id');
        }
        return view('admin.page-item.index',['page'=>Page::find($pageId)]);
    }
}
