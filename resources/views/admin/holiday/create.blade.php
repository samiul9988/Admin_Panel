@extends('admin.master')
@section('body')
            <section class="pt-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Holiday</h3>
                    </div>


                    <form action="{{route('holiday.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" name="date" class="form-control mb-2" value="{{old('date')}}" placeholder="Enter Date" required>
                                @error('date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="number" name="addedby_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>

                            <div class="form-group">
                                <label for="">Year</label>
                                <input type="number" name="year" class="form-control mb-2" value="{{old('year')}}" placeholder="Enter Year" required>
                                @error('year')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Purpose</label>
                                <input type="text" name="purpose" class="form-control mb-2" value="{{old('purpose')}}" placeholder="Enter Purpose" required>
                                @error('purpose')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Create New Holiday">
                        </div>
                    </form>
                </div>
            </section>
@endsection
