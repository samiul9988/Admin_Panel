@extends('admin.master')
@section('body')
    <section class="pt-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Employee Details</h3>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Employee ID</th>
                    <td>{{$employee->user_id}}</td>
                </tr>
                <tr>
                    <th>Employee Name</th>
                    <td>{{$employee->user->name}}</td>
                </tr>
                <tr>
                    <th>Employee Email</th>
                    <td>{{$employee->user->email}}</td>
                </tr>
                <tr>
                    <th>Employee Mobile</th>
                    <td>{{$employee->mobile}}</td>
                </tr>
                <tr>
                    <th>Company Name</th>
                    <td>{{$employee->company->name}}</td>
                </tr>

                <tr>
                    <th>Company Address</th>
                    <td>{{$employee->company->address}}</td>
                </tr>

                <tr>
                    <th>RF ID</th>
                    <td>{{$employee->rfid}}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>{{$employee->active==1?'Active':'Inactive'}}</td>
                </tr>

            </table>
        </div>
    </section>
@endsection

