@extends('admin.master')
@section('body')
            <section class="pt-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Blog Category</h3>
                    </div>


                    <form action="{{route('blog-category.update',$blog_category->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Blog Category Name</label>
                                <input type="text" name="name" class="form-control" value="{{$blog_category->name}}" placeholder="Enter Blog Category Name">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="number" name="editedby_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>

                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
            </section>
@endsection
