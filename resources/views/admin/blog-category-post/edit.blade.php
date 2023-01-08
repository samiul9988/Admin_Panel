@extends('admin.master')
@section('body')
    <section class="pt-5">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title"><icon class="fas fa-edit"></icon>Add/Edit</h3>
            </div>


            <form action="{{route('blog-category-post.update',$blog_post->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <div class="form-group">
                        <div class="card">
                            <div class="card-header">
                                Post Title:
                            </div>
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="checkbox"  name="blog_post_id" value="{{$blog_post->id}}" disabled checked >
                                        <label for="">{{$blog_post->title}}</label>
                                    </div>
                                </div>

                                @error('blog_post_id')
                                <div class="alert alert-danger">{{ "Required" }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="card" >
                            <div class="card-header">
                                Update
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    {{-- @php
                                        dd($blog_post->blogCategoryPosts);
                                    @endphp
                                    @foreach($blog_post->blogCategoryPosts as $blogCategoryPost) --}}
                                    @foreach($blog_categories as $blog_category)
                                        <div class="col-md-4">
                                            {{-- @php
                                                dd($blog_category->blogCategoryPosts);
                                            @endphp --}}
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="mr-2 pt-2" name="blog_category_ids[]" value="{{$blog_category->id}}"  
                                                            @foreach ($blog_category->blogCategoryPosts as $blogCategoryPost)
                                                                {{$blogCategoryPost->hasBlogPost($blog_post->id)?'checked':''}}
                                                            @endforeach
                                                            {{-- {{$blog_category->blogCategoryPosts->hasBlogPost($blog_post->id)?'checked':''}} --}}
                                                            >{{$blog_category->name}}</label>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    @if($blog_category->blogSubcategories)
                                                        <div class="pl-3">
                                                            @foreach($blog_category->blogSubcategories as $blog_Subcategory)
                                                                <div class="checkbox">
                                                                    <label><input type="checkbox" class="mr-2" name="blog_subcategory_ids[]" value="{{$blog_Subcategory->id}}"
                                                                        @foreach ($blog_Subcategory->blogSubcategoryPosts as $blogSubcategoryPost)
                                                                        {{$blogSubcategoryPost->hasBlogPost($blog_post->id)?'checked':''}}
                                                                    @endforeach 
                                                                        
                                                                        >{{$blog_Subcategory->name}}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                    @endif
                                                </div>
                                            </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                        @error('blog_category_ids')
                        <div class="alert alert-danger">{{ "required" }}</div>
                        @enderror
                    </div>


            


                </div>

                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
        </div>
    </section>

@endsection

@section('script')

    <script>
        $(document).ready(function(){
            $("#listOfMenus").click(function(){
                // alert('HI');
                $("#addListMenus").toggleClass('d-none');
            });
        });
    </script>
@endsection
