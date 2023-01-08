@extends('user.master')
@section('body')
    <section class="pt-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Leave Details</h3>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Leave Start Date</th>
                    <td>{{$leave->leave_start_date}}</td>
                </tr>
                <tr>
                    <th>Leave End Date</th>
                    <td>{{$leave->leave_end_date}}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>{{$leave->status}}</td>
                </tr>

                <tr>
                    <th>Detail</th>
                    <td>{!! html_entity_decode($leave->detail) !!}</td>
                </tr>

            </table>
        </div>
    </section>
@endsection

