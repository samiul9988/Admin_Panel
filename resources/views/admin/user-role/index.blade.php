@extends('admin.master')
@section('body')
    <section class="content py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Users of Role</h3>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-sm table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="20">SL NO</th>
                                    <th width=100>Action</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role name</th>
                                    <th>Role Value</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                @foreach($user->roles as $role)
                                                    <span class="bg-success mr-2">{{$role->role_name=='Admin'?'Admin':''}}</span>
                                                    <span class="bg-primary mr-2">{{$role->role_name=='Blog_Admin'?'Blog Admin':''}}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($user->roles as $role)
                                                    <span class="bg-primary mr-2 ">{{$role->role_value=='Editor'?'Editor':''}}</span>
                                                    <span class="bg-success mr-2 ">{{$role->role_value=='Super_Editor'?'Super Editor':''}}</span>
                                                @endforeach
                                            </td>
                                            <td>
{{--                                                <a href="{{route('admin.assign-role',$user->id)}}" class="text-primary"><i class="fa fa-edit"></i></a>--}}
                                                <a href="" class="text-danger"><i class="fa fa-trash"></i></a>
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
