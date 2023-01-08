@extends('admin.master')
@section('body')
    <section class="pt-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{$blog_sub_category->name}} Details</h3>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Blog Sub Category ID</th>
                    <td>{{$blog_sub_category->id}}</td>
                </tr>
                <tr>
                    <th>Blog Category Name</th>
                    <td>{{$blog_sub_category->blogCategory->name}}</td>
                </tr>
                <tr>
                    <th>Blog Sub Category Name</th>
                    <td>{{$blog_sub_category->name}}</td>
                </tr>
                <tr>
                    <th>Active</th>
                    <td>{{$blog_sub_category->active==1?'On':'Off'}}</td>
                </tr>

            </table>
        </div>
    </section>
@endsection

