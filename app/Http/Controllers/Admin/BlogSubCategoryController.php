<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('blog_sub_categories','allBlogSubCategories');
        return view('admin.blog-sub-category.index',[
            'blog_sub_categories'=>BlogSubCategory::all()
            ]);

    }

    public function blogSubCategoryActive(Request $request){
        if($request->mode=='true'){
            DB::table('blog_sub_categories')->where('id',$request->id)->update(['active'=>1]);
        }
        else{
            DB::table('blog_sub_categories')->where('id',$request->id)->update(['active'=>0]);
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
        menuSubmenu('blog_sub_categories','createBlogCategory');
        return view('admin.blog-sub-category.create',['blog_categories'=>BlogCategory::where('active',1)->get()]);

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
            'blog_category_id'=>'required',
            'name'=>'required',
        ]);
        BlogSubCategory::createBlogSubCategory($request);
        menuSubmenu('blog_sub_categories','createBlogSubCategory');
        return redirect('blog-sub-category/create')->with('success','Successfully Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        menuSubmenu('blog_sub_categories','allBlogSubCategories');
        return view('admin.blog-sub-category.view',['blog_sub_category'=>BlogSubCategory::find($id)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        menuSubmenu('blog_sub_categories','allBlogSubCategories');
        return view('admin.blog-sub-category.edit',[
            'blog_categories'=>BlogCategory::where('active',1)->get(),
            'blog_sub_category'=>BlogSubCategory::find($id)]);

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
            'blog_category_id'=>'required',
            'name'=>'required',
        ]);
        BlogSubCategory::updateBlogSubCategory($request,$id);
        menuSubmenu('blog_sub_categories','allBlogSubCategories');
        return redirect('blog-sub-category/')->with('success','Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogSubCategory::deleteBlogSubCategory($id);
        menuSubmenu('blog_sub_categories','allBlogSubCategories');
        return redirect('blog-sub-category/')->with('success','Successfully Deleted');

    }
}
