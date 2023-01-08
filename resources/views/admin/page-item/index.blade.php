@extends('admin.master')
@section('body')
    <section class="content py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header float-left">
                            @if(isset($page))
                                <div class="float-left">
                                    <h3 class="card-title">All Parts Of <span class="font-weight-bold">{{$page->name}}</span> Page</h3>
                                </div>
                                <div class="float-right">
                                    <span id="pageItemPartAdd" class="btn btn-success">Add New Page Parts</span>
                                </div>
                            @else
                                <h3 class="card-title">All Items Of Pages</h3>
                            @endif
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-sm table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="20">SL NO</th>
                                    <th width="100">Action</th>
                                    <th>Name</th>
                                    <th>Active</th>
                                    <th>Editor</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(isset($page))
                                    @foreach($page->pageItems as $page_item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <a href="{{route('page-item.show',$page_item->id)}}" class="btn btn-xs btn-outline-info mr-1 float-left"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('page-item.page-item-edit',['pageId'=>$page->id,'pageItemId'=>$page_item->id])}}" class="btn btn-xs btn-outline-primary mr-1 float-left" ><i class="fa fa-edit"></i></a>
                                                <a href="{{route('page-item.page-item-delete',['pageId'=>$page->id,'pageItemId'=>$page_item->id])}}" class="btn btn-xs btn-outline-danger mr-1 float-left"><i class="fa fa-trash"></i></a>

{{--                                                <button type="submit" class="pageItemDelete btn btn-xs btn-outline-danger mr-1 float-left" data-item-id="{{$page_item->id}}" data-id="{{$page->id}}"><i class="fa fa-trash"></i></button>--}}
                                            </td>
                                            <td>{{$page_item->name}}</td>
                                            <td>
                                                <input type="checkbox" name="toogleActive" value="{{$page_item->id}}" data-toggle="toggle" data-size="sm" {{$page_item->active==1 ? 'checked' : '' }} data-on="On"  data-off="Off" data-onstyle="success" data-offstyle="danger">
                                            </td>

                                            <td>
                                                <input type="checkbox" name="toogleEditor" value="{{$page_item->id}}" data-toggle="toggle" data-size="sm" {{$page_item->editor==1 ? 'checked' : '' }} data-on="On"  data-off="Off" data-onstyle="success" data-offstyle="danger">
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    @foreach($page_items as $page_item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <a href="{{route('page-item.show',$page_item->id)}}" class="btn btn-xs btn-outline-info mr-1 float-left"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('page-item.edit',$page_item->id)}}" class="btn btn-xs btn-outline-primary mr-1 float-left"><i class="fa fa-edit"></i></a>

                                                <form action="{{route('page-item.destroy',$page_item->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-xs btn-outline-danger mr-1 float-left"><i class="fa fa-trash"></i></button>

                                                </form>
                                            </td>
                                            <td>{{$page_item->page->name}}</td>
                                            <td>{{$page_item->name}}</td>
                                            <td>
                                                <input type="checkbox" name="toogleActive" value="{{$page_item->id}}" data-toggle="toggle" data-size="sm" {{$page_item->active==1 ? 'checked' : '' }} data-on="On"  data-off="Off" data-onstyle="success" data-offstyle="danger">
                                            </td>

                                            <td>
                                                <input type="checkbox" name="toogleEditor" value="{{$page_item->id}}" data-toggle="toggle" data-size="sm" {{$page_item->editor==1 ? 'checked' : '' }} data-on="On"  data-off="Off" data-onstyle="success" data-offstyle="danger">
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

    <section class="d-none" id="pageItemPartForm">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Page Item Parts</h3>
            </div>


            @if(isset($page))
            <form action="{{route('page-item.storeForPage',$page->id)}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Page Name</label>

                            <input type="hidden" name="page_id" value="{{$page->id}}">
                            <input type="text" value="{{$page->name}}" class="form-control" readonly>

                        @error('page_id')
                        <div class="alert alert-danger">{{ 'select a page' }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Item Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Page Name">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="checkbox" class="mr-2" name="active" value="1">
                        <label for="">Active</label>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" class="mr-2" name="editor" value="1">
                        <label for="">Editor</label>
                    </div>


                    <div class="form-group">
                        <label for="">Item Description</label>
                        <textarea name="description" id="summernote" class="form-control" rows="5">{{old('description')}}</textarea>
                        {{--                                <input type="text" name="description" class="form-control" value="{{old('description')}}" placeholder="Enter Description">--}}
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="number" name="addedby_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>
                </div>

                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
            @endif
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#pageItemPartAdd").click(function(){
                $("#pageItemPartForm").toggleClass('d-none');
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $(".pageItemDelete").on('click',function(){
                var pageId=$('.pageItemDelete').data('id');
                var pageItemId=$('.pageItemDelete').data('item-id');
                // alert(pageId);
                $.ajax({
                    url:"{{route('page-item.pageItemDelete')}}",
                    type:"POST",
                    data:{
                        _token:'{{csrf_token()}}',
                        pageId:pageId,
                        pageItemId:pageItemId,
                    },
                    success:function(response){
                        if(response.status){
                            alert(response.msg);
                            location.reload();
                        }
                        else{
                            alert('please try again');
                        }
                    }
                });

            });
        });
    </script>

    <script>
        $('input[name=toogleActive]').change(function(){
            var mode=$(this).prop('checked');
            var id=$(this).val()
            $.ajax({
                url:"{{route('page-item.active')}}",
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

    <script>
        $('input[name=toogleEditor]').change(function(){
            var mode=$(this).prop('checked');
            var id=$(this).val()
            $.ajax({
                url:"{{route('page-item.editor')}}",
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

