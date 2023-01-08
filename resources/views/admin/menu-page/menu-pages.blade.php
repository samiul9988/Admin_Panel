@extends('admin.master')
@section('body')
    <section class="content py-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pages of <span class="font-weight-bold">{{$menu->name}}</span> menu</h3>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-sm table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="20">SL NO</th>
                                    <th width="100">Action</th>
                                    <th>Menu Name</th>
                                    <th>Page Name</th>
                                    <th>Active</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($menu->menuPages as $menuPage)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <a href="" class="btn btn-xs btn-outline-info mr-1 float-left"><i class="fa fa-eye"></i></a>
                                            <a href="" class="btn btn-xs btn-outline-primary mr-1 float-left"><i class="fa fa-edit"></i></a>

                                            <form action="" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-xs btn-outline-danger mr-1 float-left"><i class="fa fa-trash"></i></button>

                                            </form>
                                        </td>
                                        <td>{{$menuPage->menu->name}}</td>
                                        <td>
                                            <a href="{{route('menu-page.page',$menuPage->page->id)}}" class="font-weight-bold">{{$menuPage->page->name}}</a>
                                        </td>
{{--                                        <td>{{$menuPage->page->name}}</td>--}}
                                        <td>
                                            <input type="checkbox" name="toogle" value="{{$menuPage->id}}" data-toggle="toggle" data-size="sm" {{$menuPage->active==1 ? 'checked' : '' }} data-on="On"  data-off="Off" data-onstyle="success" data-offstyle="danger">
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
                {{--url:"{{route('menu.active')}}",--}}
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

