@extends('admin.master')
@section('body')
<section class="pt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><icon class="fa fa-book-open mr-2"></icon> All Pages</h3>
        </div>


            <div class="card-body">

                <div class="form-group">
                    <div class="row">
                        @foreach($blog_posts as $blog_post)
                            @if(count($blog_post->blogCategoryPosts)>0 or count($blog_post->blogSubcategoryPosts)>0)
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-11">
                                                        <span>Post title : </span>
                                                        <span class="font-weight-bold">{{$blog_post->title}}</span>
                                                        , Blog Category Posts Parts :
                                                        <span class="font-weight-bold">{{count($blog_post->blogCategoryPosts)}}</span>
                                                        , Blog Subcategory Posts Parts :: <span class="font-weight-bold">{{count($blog_post->blogSubcategoryPosts)}}</span>
                                                </div>
                                                <div class="col-md-1 float-left">
                                                    <a href="{{route('blog-category-post.edit',$blog_post->id)}}" class="btn btn-xs btn-outline-primary mr-1 float-left"><i class="fa fa-edit"></i></a>
                                                    <button type="submit" name="pageDlt"  class="btn btn-xs btn-outline-danger mr-1 float-left" value="{{$blog_post->id}}"><i class="fa fa-trash"></i></button>
                                                 </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
</section>
@endsection

