@extends('admin.master')
@section('body')
    <section class="pt-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{$page->name}} Details</h3>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Menu ID</th>
                    <td>{{$page->id}}</td>
                </tr>
                <tr>
                    <th>Menu Name</th>
                    <td>{{$page->name}}</td>
                </tr>
                <tr>
                    <th>Menu Excerpt</th>
                    <td>{{$page->excerpt}}</td>
                </tr>
                <tr>
                    <th>Active</th>
                    <td>{{$page->active==1?'On':'Off'}}</td>
                </tr>

            </table>
        </div>
    </section>
@endsection

