<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogCategoryPost;
use App\Models\BlogPost;
use App\Models\BlogSubcategoryPost;
use App\Models\MenuPage;
use Illuminate\Http\Request;

class BlogCategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('blog_category_posts','allBlogCategoryPosts');
        return view('admin.blog-category-post.index',['blog_posts'=>BlogPost::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        menuSubmenu('blog_category_posts','createBlogCategoryPost');
        return view('admin.blog-category-post.create',[
            'blog_categories'=>BlogCategory::Where('active',1)->get(),
            'blog_posts'=>BlogPost::all()
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
        // return $request->all();
        $this->validate($request,[
            'blog_category_ids'=>'required',
            'blog_post_id'=>'required',
        ]);
        if(BlogCategoryPost::where('blog_post_id',$request->blog_post_id)->get()){
            BlogCategoryPost::updateBlogCategoryPost($request,$request->blog_post_id);
        }
        else{
            BlogCategoryPost::createBlogCategoryPost($request);
        }
        menuSubmenu('blog_category_posts','createBlogCategoryPost');
        return redirect()->route('blog-category-post.create')->with('success','Successfully Created');
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
        menuSubmenu('blog_category_posts','createBlogCategoryPost');
        return view('admin.blog-category-post.edit',[
            'blog_post'=>BlogPost::find($id),
            'blog_categories'=>BlogCategory::Where('active',1)->get(),
            'blog_subcategory_posts'=>BlogSubcategoryPost::all(),
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
        $this->validate($request,[
            'blog_category_ids'=>'nullable',
//            'blog_post_id'=>'required',
        ]);
        BlogCategoryPost::updateBlogCategoryPost($request,$id);
        menuSubmenu('blog_category_posts','createBlogCategoryPost');

        return redirect()->route('blog-category-post.create')->with('success','Successfully Updated');
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

    public function postIdDelete(Request $request){
//        dd($request->id);
        BlogCategoryPost::deleteBlogPostId($request->id);
        menuSubmenu('blog_category_posts','createBlogCategoryPost');
        return response()->json(['msg'=>'Successfully Deleted !','status'=>true]);
    }
}
