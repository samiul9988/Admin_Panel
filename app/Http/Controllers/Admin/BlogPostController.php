<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('blog_posts','allBlogPosts');
        return view('admin.blog-post.index',['blog_posts'=>BlogPost::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogPostActive(Request $request){
        if($request->mode=='true'){
            DB::table('blog_posts')->where('id',$request->id)->update(['active'=>1]);
        }
        else{
            DB::table('blog_posts')->where('id',$request->id)->update(['active'=>0]);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>true]);
    }

    public function create()
    {
        menuSubmenu('blog_posts','createBlogPost');
        return view('admin.blog-post.create');
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
            'title'=>'required|string',
            'excerpt'=>'nullable|string',
            'description'=>'nullable|string',
            'tags'=>'nullable|string',
            'feature_image' => 'nullable|image|mimes:jpeg,webp,jpg,png',
        ]);
//        return $request->all();
        BlogPost::createBlogPost($request);
        menuSubmenu('blog_posts','createBlogPost');
        return redirect()->route('blog-post.create')->with('success','Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        menuSubmenu('blog_posts','allBlogPosts');
        return view('admin.blog-post.view',['blog_post'=>BlogPost::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        menuSubmenu('blog_posts','allBlogPosts');
        return view('admin.blog-post.edit',['blog_post'=>BlogPost::find($id)]);
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
            'title'=>'required|string',
            'excerpt'=>'nullable|string',
            'description'=>'nullable|string',
            'tags'=>'nullable|string',
            'status'=>'required',
            'feature_image' => 'nullable|image|mimes:jpeg,webp,jpg,png',
        ]);
//        return $request->all();
        BlogPost::updateBlogPost($request,$id);
        menuSubmenu('blog_posts','allBlogPosts');
        return redirect()->route('blog-post.index')->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogPost::deleteBlogPost($id);
        menuSubmenu('blog_posts','allBlogPosts');
        return redirect()->route('blog-post.index')->with('success','Successfully Deleted');
    }
}
