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
                                    <th>Company Name</th>
                                    <th>Employee Name</th>
                                    <th>Employee Id</th>
                                    <th>Employee Email</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($employees))
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <a href="{{route('employee.show',$employee->id)}}" class="btn btn-xs btn-outline-info mr-1 float-left"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('employee.edit',$employee->id)}}" class="btn btn-xs btn-outline-primary mr-1 float-left"><i class="fa fa-edit"></i></a>

                                                <form action="{{route('employee.destroy',$employee->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-xs btn-outline-danger mr-1 float-left"><i class="fa fa-trash"></i></button>

                                                </form>
                                            </td>
                                            @if(isset($employee->company))
                                            <td>{{$employee->company->name}}</td>
                                            @endif
                                            <td>
                                                <a href="{{route('employee.user',$employee->user->id)}}">{{$employee->user->name}}</a>
                                            </td>
                                            <td>{{$employee->employee_id}}</td>
                                            <td>{{$employee->user->email}}</td>
                                            <td>{{$employee->active==1?'Active':'Inactive'}}</td>


                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <a href="{{route('employee.show',$employee->id)}}" class="btn btn-xs btn-outline-info mr-1 float-left"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('employee.edit',$employee->id)}}" class="btn btn-xs btn-outline-primary mr-1 float-left"><i class="fa fa-edit"></i></a>

                                            <form action="{{route('employee.destroy',$employee->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-xs btn-outline-danger mr-1 float-left"><i class="fa fa-trash"></i></button>

                                            </form>
                                        </td>
                                        <td>{{$employee->company->name}}</td>
                                        <td>
                                            <a href="{{route('employee.user',$employee->user->id)}}">{{$employee->user->name}}</a>
                                        </td>
                                        <td>{{$employee->employee_id}}</td>
                                        <td>{{$employee->user->email}}</td>
                                        <td>{{$employee->active==1?'Active':'Inactive'}}</td>
                                    </tr>
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

