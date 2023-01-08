@extends('admin.master')
@section('body')
    <section class="pt-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Office Location Details</h3>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Office Location Id</th>
                    <td>{{$office_location->id}}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{$office_location->title}}</td>
                </tr>
                <tr>
                    <th>Company Name</th>
                    <td>{{$office_location->company->name}}</td>
                </tr>
{{--                <tr>--}}
{{--                    <th>Division Name</th>--}}
{{--                    <td>{{$office_location->division->name}}</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>District Name</th>--}}
{{--                    <td>{{$office_location->district->name}}</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>Police Station Name</th>--}}
{{--                    <td>{{$office_location->policeStation->name}}</td>--}}
{{--                </tr>--}}

                <tr>
                    <th>Latitude</th>
                    <td>{{$office_location->lat}}</td>
                </tr>
                 <tr>
                    <th>Latitude</th>
                    <td>{{$office_location->lng}}</td>
                </tr>

                <tr>
                    <th>Office Start Time</th>
                    <td>{{$office_location->office_start_time}}</td>
                </tr>
                <tr>
                    <th>Office End Time</th>
                    <td>{{$office_location->office_end_time}}</td>
                </tr>


                <tr>
                    <th>Feature Image</th>
                    <td>
                        <img src="{{asset($office_location->featured_image)}}" alt="" width="350">
                    </td>
                </tr>

            </table>
        </div>
    </section>
@endsection

