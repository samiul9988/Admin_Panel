@extends('admin.master')
@section('body')
            <section class="pt-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit {{$menu->name}}</h3>
                    </div>


                    <form action="{{route('menu.update',$menu->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Menu Name</label>
                                <input type="text" name="name" class="form-control" value="{{$menu->name}}" placeholder="Enter Menu Name">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Menu Type</label>
                                <input type="text" name="type" class="form-control" value="{{$menu->type}}" placeholder="Enter Menu Type">
                                @error('type')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="number" name="editedby_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>


                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Update Menu">
                        </div>
                    </form>
                </div>
            </section>
@endsection
