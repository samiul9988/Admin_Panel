@extends('admin.master')
@section('body')
    <section class="pt-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{$menu->name}} Details</h3>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Menu ID</th>
                    <td>{{$menu->id}}</td>
                </tr>
                <tr>
                    <th>Menu Name</th>
                    <td>{{$menu->name}}</td>
                </tr>
                <tr>
                    <th>Menu Type</th>
                    <td>{{$menu->type}}</td>
                </tr>
                <tr>
                    <th>Active</th>
                    <td>{{$menu->active==1?'On':'Off'}}</td>
                </tr>

            </table>
        </div>
    </section>
@endsection

