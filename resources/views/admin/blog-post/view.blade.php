@extends('admin.master')
@section('body')
    <section class="pt-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Details</h3>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Post Id</th>
                    <td>{{$blog_post->id}}</td>
                </tr>
                <tr>
                    <th>Post Title</th>
                    <td>{{$blog_post->title}}</td>
                </tr>
                <tr>
                    <th>Post Excerpt</th>
                    <td>{{$blog_post->excerpt}}</td>
                </tr>
                <tr>
                    <th>Post Description</th>
                    <td>{!!html_entity_decode($blog_post->description)!!}</td>
                </tr>
                <tr>
                    <th>Post Excerpt</th>
                    <td>{{$blog_post->tags}}</td>
                </tr>
                <tr>
                    <th>Feature Image</th>
                    <td>
                        <img src="{{asset($blog_post->feature_image)}}" alt="" width="350">
                    </td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>{{$blog_post->status}}</td>
                </tr>

            </table>
        </div>
    </section>
@endsection

