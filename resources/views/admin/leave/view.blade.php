@extends('admin.master')
@section('body')
    <section class="pt-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Leave Details</h3>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>User Name</th>
                    <td>{{$leave->user->name}}</td>
                </tr>
                <tr>
                    <th>Employee Id</th>
                    <td>{{$leave->employee_id}}</td>
                </tr>
                <tr>
                    <th>Detail</th>
                    <td>{!! html_entity_decode($leave->detail) !!}</td>
                </tr>

            </table>
        </div>
    </section>
@endsection

