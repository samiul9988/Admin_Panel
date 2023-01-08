@extends('admin.master')
@section('body')
    <section class="content py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            @if(isset($menu))
                                <h3 class="card-title">Pages of <span class="font-weight-bold">{{$menu->name}}</span> Menu</h3>
                            @else
                            <h3 class="card-title">All Menu</h3>
                            @endif
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-sm table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="20">SL NO</th>
                                    <th width="100">Action</th>
                                    <th>Name</th>
                                    <th>Page Items</th>
                                    <th>Active</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($menu))
                                    @foreach($menu->menuPages as $menuPage)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <a href="{{route('page.show',$menuPage->page->id)}}" class="btn btn-xs btn-outline-info mr-1 float-left"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('page.edit',$menuPage->page->id)}}" class="btn btn-xs btn-outline-primary mr-1 float-left"><i class="fa fa-edit"></i></a>

                                                <form action="{{route('page.destroy',$menuPage->page->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-xs btn-outline-danger mr-1 float-left"><i class="fa fa-trash"></i></button>

                                                </form>
                                            </td>
                                            <td>{{$menuPage->page->name}}</td>
                                            <td>
                                                <a href="{{route('page.page-item',$menuPage->page->id)}}">{{count($menuPage->page->pageItems)}}</a>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="toogle" value="{{$menuPage->page->id}}" data-toggle="toggle" data-size="sm" {{$menuPage->page->active==1 ? 'checked' : '' }} data-on="On"  data-off="Off" data-onstyle="success" data-offstyle="danger">
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    @foreach($pages as $page)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <a href="{{route('page.show',$page->id)}}" class="btn btn-xs btn-outline-info mr-1 float-left"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('page.edit',$page->id)}}" class="btn btn-xs btn-outline-primary mr-1 float-left"><i class="fa fa-edit"></i></a>

                                                <form action="{{route('page.destroy',$page->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-xs btn-outline-danger mr-1 float-left"><i class="fa fa-trash"></i></button>

                                                </form>
                                            </td>
                                            <td>{{$page->name}}</td>
                                            <td>
                                                <a href="{{route('page.page-item',$page->id)}}">{{count($page->pageItems)}}</a>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="toogle" value="{{$page->id}}" data-toggle="toggle" data-size="sm" {{$page->active==1 ? 'checked' : '' }} data-on="On"  data-off="Off" data-onstyle="success" data-offstyle="danger">
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif
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
                url:"{{route('page.active')}}",
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

