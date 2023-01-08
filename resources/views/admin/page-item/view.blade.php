@extends('admin.master')
@section('body')
    <section class="pt-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{$page_item->page->name}} Details</h3>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Page Name</th>
                    <td>{{$page_item->page->name}}</td>
                </tr>
                <tr>
                    <th>Item Name</th>
                    <td>{{$page_item->name}}</td>
                </tr>
                <tr>
                    <th>Item Description</th>
                    <td>{!!html_entity_decode($page_item->description)!!}</td>
                </tr>
                <tr>
                    <th>Active</th>
                    <td>{{$page_item->active==1?'On':'Off'}}</td>
                </tr>

                <tr>
                    <th>Editor</th>
                    <td>{{$page_item->editor==1?'On':'Off'}}</td>
                </tr>

            </table>
        </div>
    </section>
@endsection

