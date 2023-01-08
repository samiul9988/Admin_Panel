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
                                    <th wisth="100">Action</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Employee Id</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($users))
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <a href="{{route('admin.show-user',$user->id)}}" class="btn btn-xs btn-outline-info"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('admin.edit-user',$user->id)}}" class="btn btn-xs btn-outline-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('admin.delete-user',$user->id)}}" class="btn btn-xs btn-outline-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            @if(isset($user->employee))
                                                <td><a href="{{route('admin.user.employee',$user->employee->id)}}">
{{--                                                        @php--}}
{{--                                                            dd($user->employee);--}}
{{--                                                        @endphp--}}
                                                        @if($user->employee->employee_id)
                                                            {{$user->employee->employee_id}}
                                                        @else
                                                            {{$user->employee->id}}
                                                        @endif
                                                    </a>
                                                </td>
                                            @else
                                                <td></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <a href="{{route('admin.show-user',$user->id)}}" class="btn btn-xs btn-outline-info"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('admin.edit-user',$user->id)}}" class="btn btn-xs btn-outline-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('admin.delete-user',$user->id)}}" class="btn btn-xs btn-outline-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        @if(isset($user->employee))
                                            <td><a href="{{route('admin.user.employee',$user->employee->id)}}">
{{--                                                    @php--}}
{{--                                                        dd($user->employee);--}}
{{--                                                    @endphp--}}
                                                    @if($user->employee->employee_id)
                                                        {{$user->employee->employee_id}}
                                                    @else
                                                        {{$user->employee->id}}
                                                    @endif

                                                </a>
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
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

