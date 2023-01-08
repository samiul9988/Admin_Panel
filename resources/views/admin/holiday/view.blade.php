@extends('admin.master')
@section('body')
    <section class="pt-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Company Details</h3>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Date</th>
                    <td>{{$holiday->date}}</td>
                </tr>

                <tr>
                    <th>Year</th>
                    <td>{{$holiday->year}}</td>
                </tr>

                <tr>
                    <th>Purpose</th>
                    <td>{{$holiday->purpose}}</td>
                </tr>

            </table>
        </div>
    </section>
@endsection

