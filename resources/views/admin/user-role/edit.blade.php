@extends('admin.master')
@section('body')
    <section class="pt-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Assign Role</h3>
            </div>


            <form action="{{route('admin.update-role',$role->id)}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Name</label>
                        <input type="text" class="form-control" name="{{$role->user->id}}" value="Name: {{$role->user->name}}, Email: {{$role->user->email}}" readonly>
                        <input type="number" name="edited_by_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>
{{--                        <input type="number" name="edited_by_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>--}}
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Role Name</label>
                        <select name="role_name" class="form-control">
                            <option disabled >--  Select Role --</option>
                            <option value="admin" {{$role->role_name=='admin'? 'selected':''}}>Admin</option>
                            <option value="blog_admin" {{$role->role_name=='blog_admin'? 'selected':''}}>Blog Admin</option>
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

