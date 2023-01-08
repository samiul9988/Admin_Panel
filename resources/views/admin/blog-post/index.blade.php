@extends('admin.master')
@section('body')
    <section class="content py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Blog Posts</h3>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-sm table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="20">SL NO</th>
                                    <th width="100">Action</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Active</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blog_posts as $blog_post)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <a href="{{route('blog-post.show',$blog_post->id)}}" class="btn btn-xs btn-outline-info mr-1 float-left"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('blog-post.edit',$blog_post->id)}}" class="btn btn-xs btn-outline-primary mr-1 float-left"><i class="fa fa-edit"></i></a>

                                            <form action="{{route('blog-post.destroy',$blog_post->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-xs btn-outline-danger mr-1 float-left"><i class="fa fa-trash"></i></button>

                                            </form>
                                        </td>
                                        <td>{{$blog_post->title}}</td>
                                        <td>
                                            <img src="{{asset('/')}}{{$blog_post->feature_image}}" alt="{{$blog_post->id}}" width="100">
                                        </td>
                                        <td>
                                            <input type="checkbox" name="toogle" value="{{$blog_post->id}}" data-toggle="toggle" data-size="sm" {{$blog_post->active==1 ? 'checked' : '' }} data-on="On"  data-off="Off" data-onstyle="success" data-offstyle="danger">
                                        </td>

                                        <td>
                                            {{$blog_post->status}}
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection

@section('script')
    <script>
        $('input[name=toogle]').change(function(){
            var mode=$(this).prop('checked');
            var id=$(this).val()
            $.ajax({
                url:"{{route('blog-post.active')}}",
                type:"POST",
                data:{
                    _token:'{{csrf_token()}}',
                    mode:mode,
                    id:id,
                },
                success:function(response){
                    if(response.status){
                        alert(response.msg);
                    }
                    else{
                        alert('please try again');
                    }
                }
            })
        });
    </script>
@endsection

