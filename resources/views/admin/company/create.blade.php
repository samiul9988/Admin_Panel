@extends('admin.master')
@section('body')
            <section class="pt-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Company</h3>
                    </div>
                    <form action="{{route('company.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control mb-2" value="{{old('name')}}" placeholder="Enter Name">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="number" name="addedby_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>

                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control mb-2" value="{{old('address')}}" placeholder="Enter Address">
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Create New Company">
                        </div>
                    </form>
                </div>
            </section>
@endsection
