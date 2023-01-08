@extends('admin.master')
@section('body')
            <section class="pt-3">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Edit {{$leave->user->name}} </h3>
                    </div>


                    <form action="{{route('leave.update',$leave->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">


                            <div class="form-group">
                                <label for="">User Name</label>
                                <select name="user_id" id="" class="form-control">
                                    <option disabled selected>---Select User---</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}" {{$leave->user_id==$user->id?'selected':''}}>{{$user->name}} & {{$user->email}}</option>
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
                                    <option value="{{$leave->employee_id}}" selected>{{$leave->employee_id}}</option>
                                </select>
                                @error('employee_id')
                                <div class="alert alert-danger" >{{'Select Employee Id'}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Detail</label>
                                <textarea name="detail" id="summernote" class="form-control" rows="5">{{$leave->detail}}</textarea>
                                @error('detail')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Leave Start Date</label>
                                <input type="date" name="leave_start_date" value="{{$leave->leave_start_date}}" class="form-control">
                                @error('leave_start_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Leave End Date</label>
                                <input type="date" name="leave_end_date" value="{{$leave->leave_end_date}}" class="form-control">
                                @error('leave_end_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Status</label>

                                <select name="status" id="selectStatus" data-id="{{$leave->id}}" class="form-control">
                                    <option value="pending" {{$leave->status=='pending'?'selected':''}} >Pending</option>
                                    <option value="approved" {{$leave->status=='approved'?'selected':''}}>Approve</option>
                                    <option value="cancelled" {{$leave->status=='cancelled'?'selected':''}}>Cancel</option>
                                </select>

                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <input type="number" name="editedby_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>
                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Update">
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
