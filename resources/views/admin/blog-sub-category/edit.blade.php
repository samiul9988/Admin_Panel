@extends('admin.master')
@section('body')
            <section class="pt-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Blog Sub Category</h3>
                    </div>


                    <form action="{{route('blog-sub-category.update',$blog_sub_category->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Blog Category Name</label>
                                <select name="blog_category_id" class="form-control">
                                    <option selected disabled> -- select option--</option>
                                    @foreach($blog_categories as $blog_category)
                                        <option value="{{$blog_category->id}}" {{$blog_category->id==$blog_sub_category->blog_category_id?'selected':''}} >{{$blog_category->name}}</option>
                                    @endforeach
                                </select>
                                @error('blog_category_id')
                                <div class="alert alert-danger">{{ 'select a blog category' }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Blog Sub Category Name</label>
                                <input type="text" name="name" class="form-control" value="{{$blog_sub_category->name}}" placeholder="Enter Blog Sub Category Name">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="number" name="addedby_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>

                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </section>
@endsection
