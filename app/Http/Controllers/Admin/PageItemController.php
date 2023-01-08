<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class PageItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::get('page_id')){
            return view('admin.page-item.index',['page'=>Page::find(Session::get('page_id'))]);
        }
        else{
            menuSubmenu('page_items','allPageItems');
            return view('admin.page-item.index',['page_items'=>PageItem::all()]);
        }

    }

    public function pageItemActive(Request $request){
        if($request->mode=='true'){
            DB::table('page_items')->where('id',$request->id)->update(['active'=>1]);
        }
        else{
            DB::table('page_items')->where('id',$request->id)->update(['active'=>0]);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>true]);
    }

    public function pageItemEditor(Request $request){
        if($request->mode=='true'){
            DB::table('page_items')->where('id',$request->id)->update(['editor'=>1]);
        }
        else{
            DB::table('page_items')->where('id',$request->id)->update(['editor'=>0]);
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
        menuSubmenu('page_items','createPageItem');
        return view('admin.page-item.create',['pages'=>Page::where('active',1)->get()]);
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
            'page_id'=>'required',
            'name'=>'required',
            'description'=>'required',
        ]);
        PageItem::createPageItem($request);
        menuSubmenu('page_items','createPageItem');
        return redirect()->route('page-item.create')->with('success','Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        menuSubmenu('page_items','allPageItems');
        return view('admin.page-item.view',['page_item'=>PageItem::find($id)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        menuSubmenu('page_items','allPageItems');
        return view('admin.page-item.edit',[
            'page_item'=>PageItem::find($id),
            'pages'=>Page::where('active',1)->get()
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

        $this->validate($request,[
            'page_id'=>'required',
            'name'=>'required',
            'description'=>'required',
        ]);

        PageItem::updatePageItem($request,$id);
        if(Session::get('page_id')){
            return redirect()->route('page.page-item',Session::get('page_id'))->with('success','Successfully Updated');
        }
        return redirect()->route('page-item.index')->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PageItem::deletePageItem($id);
        menuSubmenu('page_items','allPageItems');
        return redirect()->route('page-item.index')->with('success','Successfully Deleted');

    }

    public function storeForPage(Request $request,$pageId){
//        return $request->all();
        $this->validate($request,[
            'page_id'=>'required',
            'name'=>'required',
            'description'=>'required',
        ]);
        Session::put('page_id',$pageId);
        PageItem::createPageItem($request);
        return redirect()->route('page.page-item',Session::get('page_id'))->with('success','Successfully Created');

//        return redirect()->route('page-item.index')->with('success','Successfully Created');
    }

    public function pageItemDelete($pageId,$pageItemId){
        PageItem::deletePageItem($pageItemId);
        return redirect()->route('page.page-item',$pageId)->with('success','Successfully Created');

//        dd($request->all());
//        PageItem::deletePageItem($request->pageItemId);
//        return response()->json(['msg'=>'Successfully Deleted','status'=>true]);

//        return redirect()->route('page-item.index')->with('success','Successfully deleted');
    }
    public function pageItemEdit($pageId,$pageItemId){
        Session::put('page_id',$pageId);
        return view('admin.page-item.edit',[
            'page_item'=>PageItem::find($pageItemId)
        ]);
    }
}
