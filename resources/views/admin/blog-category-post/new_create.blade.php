@extends('admin.master')
@section('body')
            <section class="pt-5">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title" id="addBlogCategoryPost"><icon class="fa fa-plus mr-2"></icon> Add Blog Category Post</h3>
                    </div>


                    <form action="{{route('blog-category-post.store')}}" method="POST">
                        @csrf
                        <div class="card-body d-none" id="addBlogCategoryPostForm">

                            <div class="form-group">
                                <div class="card">
                                    <div class="card-header">
                                        Blog Category Name:
                                    </div>
                                    <div class="card-body h-100">
                                        <div class="row">
                                            @foreach($blog_categories as $blog_category)
                                                <div class="col-md-4">
                                                    <input type="checkbox" id="" class="" name="blog_category_ids[]" value="{{$blog_category->id}}"
                                                        @foreach($blog_category_posts as $blog_category_post)
                                                            {{$blog_category_post->blog_category_id==$blog_category->id? 'checked disabled':''}}
                                                        @endforeach
                                                    >
                                                    <label for="">{{$blog_category->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('blog_category_ids')
                                        <div class="alert alert-danger mt-2">{{ "Blog Category Name Is Required" }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div>
                                <input type="checkbox" id="listBlogPost">
                                <label for="">List of Blog Post</label>
                            </div>
                            <div class="form-group d-none" id="addBlogPost">
                                <div class="card">
                                    <div class="card-header">
                                        Blog Post Title
                                    </div>
                                    <div class="card-body h-100">
                                        <div class="row" >
                                            @foreach($blog_posts as $blog_post)
                                                <div class="col-md-12">
                                                    <input type="checkbox" id="" name="blog_post_ids[]" value="{{$blog_post->id}}">
                                                    <label for="">{{$blog_post->title}}</label>
                                                </div>
                                            @endforeach
                                        </div>

                                        @error('blog_post_ids')
                                        <div class="alert alert-danger mt-2">{{ "Blog Post Name Is Required" }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="pt-2">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>


                    </form>
                </div>
            </section>

{{--            <section class="pt-5">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h3 class="card-title"><icon class="fa fa-book-open mr-2"></icon> All Pages</h3>--}}
{{--                    </div>--}}


{{--                        <div class="card-body">--}}

{{--                            <div class="form-group">--}}
{{--                                <div class="row">--}}

{{--                                    @foreach($all_pages as $page)--}}
{{--                                        @php--}}
{{--                                            $c=0;--}}
{{--                                            $active=0;--}}
{{--                                            $title_hide=0;--}}
{{--                                        @endphp--}}
{{--                                    @if(count($page->menuPages)>0)--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="card">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-1 pt-1">--}}
{{--                                                        <icon class="fas fa-arrows-alt"></icon>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-10  pt-1">--}}
{{--                                                        <span>Page Title : </span>--}}
{{--                                                        <span class="font-weight-bold mr-1">{{$page->name}},</span>--}}
{{--                                                        @php--}}
{{--                                                            foreach ($menu_pages as $menu_page){--}}
{{--                                                                if ($page->id==$menu_page->page_id){--}}
{{--                                                                    $active = $menu_page->active;--}}
{{--                                                                    $title_hide=$menu_page->title_hide;--}}
{{--                                                                    if (isset($menu_page->menu_id)){--}}
{{--                                                                        $c=$c+1;--}}
{{--                                                                    }--}}
{{--                                                                }--}}
{{--                                                            }--}}
{{--                                                        @endphp--}}

{{--                                                        Active :--}}
{{--                                                        <span class="font-weight-bold mr-1"> {{$active==1?'Yes':'No'}},</span>--}}
{{--                                                        List In Menu : <span class="font-weight-bold mr-1">{{$c>0?'Yes':'No'}},</span>--}}

{{--                                                        Title Hide: <span class="font-weight-bold mr-1">{{$title_hide==1?'Yes':'No'}},</span>--}}
{{--                                                        Parts :--}}
{{--                                                        <span class="font-weight-bold">--}}
{{--                                                            {{$c}}--}}
{{--                                                        </span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-1 pt-1">--}}
{{--                                                        <a href="{{route('menu-page.edit',$page->id)}}" class="btn btn-xs btn-primary mr-1 float-left"><i class="fa fa-edit"></i></a>--}}
{{--                                                        <button type="submit" name="pageDlt"  class="btn btn-xs btn-danger mr-1 float-left" value="{{$page->id}}"><i class="fa fa-trash"></i></button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    @endif--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                </div>--}}
{{--            </section>--}}


@endsection

@section('script')
{{--    <script>--}}
{{--        $('button[name=pageDlt]').click(function(){--}}
{{--            // var mode=$(this).prop('checked');--}}
{{--            var id=$(this).val()--}}
{{--            $.ajax({--}}
{{--                url:"{{route('menu-page.pageDelete')}}",--}}
{{--                type:"POST",--}}
{{--                data:{--}}
{{--                    _token:'{{csrf_token()}}',--}}
{{--                    id:id,--}}
{{--                },--}}
{{--                success:function(response){--}}
{{--                    if(response.status){--}}
{{--                        alert(response.msg);--}}
{{--                        window.location.reload();--}}
{{--                    }--}}
{{--                    else{--}}
{{--                        alert('please try again');--}}
{{--                    }--}}
{{--                }--}}
{{--            })--}}
{{--        });--}}
    </script>

    <script>
        $(document).ready(function(){
            $("#listBlogPost").click(function(){
                // alert('HI');
                $("#addBlogPost").toggleClass('d-none');
            });
        });
    </script>

<script>
    $(document).ready(function(){
        $("#addBlogCategoryPost").click(function(){
            // alert('HI');
            $("#addBlogCategoryPostForm").toggleClass('d-none');
        });
    });
</script>
@endsection
