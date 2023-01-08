@extends('admin.master')
@section('body')
            <section class="pt-3">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Create New Blog Post</h3>
                    </div>


                    <form action="{{route('blog-post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="Enter Title">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="summernote" class="form-control" rows="5">{{old('description')}}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Excerpt</label>
                                <input type="text" name="excerpt" class="form-control" value="{{old('excerpt')}}" placeholder="Enter post excerpt">
                                @error('excerpt')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Tags(For Search)</label>
                                <input type="text" name="tags" class="form-control" value="{{old('tags')}}" placeholder="Ex: cricket, football, wedding etc">
                                @error('tags')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Feature Image</label>
                                <input type="file" class="form-control-file" name="feature_image" value="{{old('feature_image')}}">
                                @error('feature_image')
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
