@extends('admin.master')
@section('body')
    <section class="pt-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Company Details</h3>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Company Name</th>
                    <td>{{$company->name}}</td>
                </tr>

                <tr>
                    <th>Company Address</th>
                    <td>{{$company->address}}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>{{$company->active==1?'Active':'Inactive'}}</td>
                </tr>

            </table>
        </div>
    </section>
@endsection

