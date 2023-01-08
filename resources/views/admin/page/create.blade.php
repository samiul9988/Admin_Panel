@extends('admin.master')
@section('body')
            <section class="pt-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Page</h3>
                    </div>


                    <form action="{{route('page.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Page Name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Page Name">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Page Excerpt</label>
                                <input type="text" name="excerpt" class="form-control" value="{{old('excerpt')}}" placeholder="Enter Page Excerpt">
                                @error('type')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="number" name="addedby_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>


                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Create New Page">
                        </div>
                    </form>
                </div>
            </section>
@endsection
