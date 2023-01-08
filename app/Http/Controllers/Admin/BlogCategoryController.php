<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\PageItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('blog_categories','allBlogCategories');
        return view('admin.blog-category.index',['blog_categories'=>BlogCategory::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        menuSubmenu('blog_categories','createBlogCategory');
        return view('admin.blog-category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function blogCategoryActive(Request $request){
        if($request->mode=='true'){
            DB::table('blog_categories')->where('id',$request->id)->update(['active'=>1]);
        }
        else{
            DB::table('blog_categories')->where('id',$request->id)->update(['active'=>0]);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>true]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);
        BlogCategory::createBlogCategory($request);
        menuSubmenu('blog_categories','createBlogCategory');
        return redirect()->route('blog-category.create')->with('success','Successfully Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        menuSubmenu('blog_categories','allBlogCategories');
        return view('admin.blog-category.view',['blog_category'=>BlogCategory::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        menuSubmenu('blog_categories','allBlogCategories');
        return view('admin.blog-category.edit',['blog_category'=>BlogCategory::find($id)]);

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
            'name'=>'required',
        ]);
        BlogCategory::updateBlogCategory($request,$id);
        menuSubmenu('blog_categories','allBlogCategories');
        return redirect()->route('blog-category.index')->with('success','Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogCategory::deleteBlogCategory($id);
        menuSubmenu('blog_categories','allBlogCategories');
        return redirect()->route('blog-category.index')->with('success','Successfully Deleted');

    }
}
