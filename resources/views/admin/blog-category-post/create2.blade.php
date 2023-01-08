@extends('admin.master')
@section('body')
            <section class="pt-5">
                <div class="card h-100">
                    <div class="card-header h-100">
                        <h3 class="card-title" id=""><icon class="fa fa-plus mr-2"></icon> Add Category and Subcategory Post</h3>
                    </div>


                    <form method="post" action="{{route('blog-category-post.store')}}">
                        @csrf
                        <div class="card-body h-100">

                            <div class="form-group">
                                <div class="card">

                                    <div class="card-body h-100" style="background-color: #ccc;">
                                        <div class="h3 pb-3">
                                            Add Category and Subcategory
                                        </div>
                                        <div class="row">
                                            @foreach($blog_categories->chunk(ceil($blog_categories->count()/5)) as $chunk_blog_categories)
                                                <div class="col-md-4">
                                                    @foreach($chunk_blog_categories as $blog_category)
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <div class="checkbox">
                                                                    <label><input type="checkbox" class="mr-2 pt-2" name="blog_category_ids[]" value="{{$blog_category->id}}">{{$blog_category->name}}</label>
                                                                </div>
                                                            </div>

                                                            <div class="card-body">
                                                                @if($blog_category->blogSubcategories)
                                                                    <div class="pl-3">
                                                                        @foreach($blog_category->blogSubcategories as $blog_Subcategory)
                                                                            <div class="checkbox">
                                                                                <label><input type="checkbox" class="mr-2" name="blog_subcategory_ids[]" value="{{$blog_Subcategory->id}}">{{$blog_Subcategory->name}}</label>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>

                                                                @endif
                                                            </div>

                                                        </div>
                                                    @endforeach
                                                </div>

                                            @endforeach
                                        </div>
                                        @error('blog_category_ids')
                                            <div class="alert alert-danger mt-2">{{ "Blog Category Is Required" }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <div class="card">
                                                <div class="card-header">
                                                    Blog Post Title
                                                </div>
                                                <div class="card-body">
                                                    <div class="row" >

                                                        <select id="" name="blog_post_id" class="form-control">
                                                            <option value="" disabled>--select--</option>
                                                            @foreach($blog_posts as $blog_post)

                                                            <option value="{{$blog_post->id}}" {{$blog_post->hasBlogCategoryPost($blog_post->id) || $blog_post->hasBlogSubcategoryPost($blog_post->id)?'disabled':''}}>{{$blog_post->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    @error('blog_post_id')
                                                    <div class="alert alert-danger mt-2">{{ "Blog Post Is Required" }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </section>

            <section class="pt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><icon class="fa fa-book-open mr-2"></icon> All Blog Posts</h3>
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
                                                                <button type="submit" name="blogCategoryPostDlt"  class="btn btn-xs btn-outline-danger mr-1 float-left" value="{{$blog_post->id}}"><i class="fa fa-trash"></i></button>
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

@section('script')
<script>
    $('button[name=blogCategoryPostDlt]').click(function(){
        // var mode=$(this).prop('checked');
        var id=$(this).val()
        $.ajax({
            url:"{{route('blog-category-post.PostDelete')}}",
            type:"POST",
            data:{
                _token:'{{csrf_token()}}',
                id:id,
            },
            success:function(response){
                if(response.status){
                    alert(response.msg);
                    window.location.reload();
                }
                else{
                    alert('please try again');
                }
            }
        })
    });
</script>
@endsection



