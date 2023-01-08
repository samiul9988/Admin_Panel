@extends('admin.master')
@section('body')
            <section class="pt-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Assign Role</h3>
                    </div>


                    <form action="{{route('admin.assign-role')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Role Name</label>
                                <select name="user_id" class="form-control" required>
                                    <option disabled >--  Select Role --</option>
                                        @foreach($users as $user)
                                            @if($user->hasRoleUserId($user->id))
                                            @else
                                                <option value="{{$user->id}}">{{$user->name}}, Email: {{$user->email}}</option>
                                            @endif
                                        @endforeach
                                </select>

                                <input type="number" name="added_by_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Role Value</label>
                                <select name="role_name" class="form-control" required>
                                    <option disabled >--  Select Role --</option>
                                    <option value="admin">Admin</option>
                                    <option value="blog_admin">Blog Admin</option>
                                </select>
                            </div>


                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </section>
@endsection
