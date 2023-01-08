@extends('user.master')
@section('body')
    <section class="py-5">
        <h1 class="text-center">This Is DashBoard of {{Auth::user()->name}}</h1>
    </section>
@endsection
