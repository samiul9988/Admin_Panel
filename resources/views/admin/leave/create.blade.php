@extends('admin.master')
@section('body')
            <section class="pt-3">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Leave Form</h3>
                    </div>


                    <form action="{{route('leave.store')}}" method="POST">
                        @csrf
                        <div class="card-body">


                            <div class="form-group">
                                <label for="">User Name</label>
                                <select name="user_id" id="" class="form-control">
                                    <option disabled selected>---Select User---</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}} & {{$user->email}}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <div class="alert alert-danger">{{'Select an User Name'}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Employee Id</label>
                                <select name="employee_id" id="sel_employee_id" class="form-control">
                                    <option value="0" disabled selected>--- Select Employee Id ---</option>
                                </select>
                                @error('employee_id')
                                <div class="alert alert-danger" >{{'Select Employee Id'}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Detail</label>
                                <textarea name="detail" id="summernote" class="form-control" rows="5">{{old('detail')}}</textarea>
                                @error('detail')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Leave Start Date</label>
                                <input type="date" name="leave_start_date" value="{{old('leave_start_date')}}" class="form-control">
                                @error('leave_start_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Leave End Date</label>
                                <input type="date" name="leave_end_date" value="{{old('leave_end_date')}}" class="form-control">
                                @error('leave_end_date')
                                <div class="alert alert-danger">{{ $message }}</div>
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

@section('script')
    <script>
        $(document).ready(function() {

            $('select[name="user_id"]').on('change', function() {
                var userID = $(this).val();

                var url = window.location.origin+'/admin/leave/ajax/'+userID;

                $('#sel_employee_id').find('option').not(':first').remove();
                if(userID) {
                    $.ajax({
                        url: url,
                        type: "GET",
                        dataType: "json",

                        success:function (response) {

                            var len = 0;
                            if (response.data != null) {
                                len = response.data.length;
                            }
                            console.log(response.data)
                            if (len>0) {
                                for (var i = 0; i<len; i++) {
                                    var id = response.data[i].id;
                                    var option = "<option value='"+id+"'>"+id+"</option>";

                                    $("#sel_employee_id").append(option);
                                }
                            }
                        }

                    });

                }

            });

        });
    </script>
@endsection
