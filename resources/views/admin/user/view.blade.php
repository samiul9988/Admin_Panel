@extends('admin.master')
@section('body')
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <th>Role</th>

                        @if(isset($user->roles))
                            <td>
                                @foreach($user->roles as $role)
                                    {{$role->role_name}}
                                @endforeach
                            </td>
                        @else
                            <td></td>
                        @endif

                    </tr>
                </table>
            </div>
        </div>
    </section>
@endsection
