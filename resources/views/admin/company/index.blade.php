@extends('admin.master')
@section('body')
    <section class="content py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All User</h3>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-sm table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="20">SL NO</th>
                                    <th width="100">Action</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <a href="{{route('company.show',$company->id)}}" class="btn btn-xs btn-outline-info mr-1 float-left"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('company.edit',$company->id)}}" class="btn btn-xs btn-outline-primary mr-1 float-left"><i class="fa fa-edit"></i></a>

                                            <form action="{{route('company.destroy',$company->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-xs btn-outline-danger mr-1 float-left"><i class="fa fa-trash"></i></button>

                                            </form>
                                        </td>
                                        <td>{{$company->name}}</td>
{{--                                        <td>--}}
{{--                                            <input type="checkbox" name="toogle" value="{{$company->id}}" data-toggle="toggle" data-size="sm" {{$company->status==1 ? 'checked' : '' }} data-on="active"  data-off="inactive" data-onstyle="success" data-offstyle="danger">--}}
{{--                                        </td>--}}
                                        <td>{{$company->address}}</td>
                                        <td>{{$company->active==1?'Active':'Inactive'}}</td>

                                        
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

{{--@section('script')--}}
{{--    <script>--}}
{{--        $('input[name=toogle]').change(function(){--}}
{{--            var mode=$(this).prop('checked');--}}
{{--            var id=$(this).val()--}}
{{--            $.ajax({--}}
{{--                url:"{{route('company.status')}}",--}}
{{--                type:"POST",--}}
{{--                data:{--}}
{{--                    _token:'{{csrf_token()}}',--}}
{{--                    mode:mode,--}}
{{--                    id:id,--}}
{{--                },--}}
{{--                success:function(response){--}}
{{--                    if(response.status){--}}
{{--                        alert(response.msg);--}}
{{--                    }--}}
{{--                    else{--}}
{{--                        alert('please try again');--}}
{{--                    }--}}
{{--                }--}}
{{--            })--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}

