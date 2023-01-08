@extends('user.master')
@section('body')
            <section class="pt-3">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Leave Form</h3>
                    </div>


                    <form action="{{route('employee-leave.store')}}" method="POST">
                        @csrf
                        <div class="card-body">

                            <input type="text" name="user_id" value="{{$user->id}}" class="form-control" hidden>

                            <input type="text" name="employee_id" value="{{$user->employee->id}}" class="form-control" hidden>

                            <div class="form-group">
                                <label for="">Reason For Leave</label>
                                <textarea name="detail" id="summernote" class="form-control" rows="5">{{old('detail')}}</textarea>
                                @error('detail')
                                <div class="alert alert-danger">{{ "Write something for leave" }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Leave Start Date</label>
                                <input type="date" name="leave_start_date" value="{{old('leave_start_date')}}" class="form-control">
                                @error('leave_start_date')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Leave End Date</label>
                                <input type="date" name="leave_end_date" value="{{old('leave_end_date')}}" class="form-control">
                                @error('leave_end_date')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="number" name="addedby_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>
                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Create">
                        </div>
                    </form>
                </div>
            </section>
@endsection
