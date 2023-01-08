@extends('admin.master')
@section('body')
            <section class="pt-3">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Edit</h3>
                    </div>


                    <form action="{{route('blog-post.update',$blog_post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" value="{{$blog_post->title}}" class="form-control" placeholder="Enter Title">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="summernote" class="form-control" rows="5">{{$blog_post->description}}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Excerpt</label>
                                <input type="text" name="excerpt" class="form-control" value="{{$blog_post->excerpt}}" placeholder="Enter post excerpt">
                                @error('excerpt')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Tags(For Search)</label>
                                <input type="text" name="tags" class="form-control" value="{{$blog_post->tags}}" placeholder="Ex: cricket, football, wedding etc">
                                @error('tags')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option>--Select--</option>
                                    <option value="pending" {{$blog_post->status=='pending'?'selected':''}}>Pending</option>
                                    <option value="draft" {{$blog_post->status=='draft'?'selected':''}}>Draft</option>
                                    <option value="published" {{$blog_post->status=='published'?'selected':''}}>Published</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Feature Image</label>
                                <input type="file" name="feature_image" class="form-control-file mb-2" value="{{$blog_post->feature_image}}" >
                                <img src="{{asset($blog_post->feature_image)}}" alt="{{$blog_post->id}}" width="350">
                            </div>

                            <input type="number" name="editedby_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>
                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="update">
                        </div>
                    </form>
                </div>
            </section>
@endsection
