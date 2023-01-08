@extends('admin.master')
@section('body')
            <section class="pt-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Employee</h3>
                    </div>


                    <form action="{{route('employee.update',$employee->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="form-group">
                                <label for="">User Name</label>
                                <select name="user_id" class="form-control" readonly>
                                    <option disabled> -- select option--</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}" {{$employee->user_id==$user->id ?'selected':''}} disabled>{{$user->name , $user->email}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Designation</label>
                                <input type="text" class="form-control" name="designation" value="{{$employee->designation}}">
                                @error('designation')
                                <div class="alert alert-danger mb-2">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="mr-2" for="">Gender :</label>
                                <input type="checkbox" name="gender" value="male" {{$employee->gender=='male'?'checked':''}}> <label class="mr-1">Male</label>
                                <input type="checkbox" name="gender" value="female" {{$employee->gender=='female'?'checked':''}}> <label class="mr-1">Female</label>
                                <input type="checkbox" name="gender" value="other" {{$employee->gender=='other'?'checked':''}}> <label class="mr-1">Other</label>
                                @error('gender')
                                <div class="alert alert-danger mb-2">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="">Employee Id</label>
                                <input type="number" class="form-control" name="employee_id" value="{{$employee->employee_id}}">
                                @error('employee_id')
                                <div class="alert alert-danger mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
{{--                                <label for="">User Name</label>--}}
                                <select name="user_id" class="form-control" readonly hidden>
                                    <option disabled> -- select option--</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}" {{$employee->user_id==$user->id ?'selected':''}}>{{$user->name , $user->email}}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <div class="alert alert-danger">{{ 'select a user' }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control mb-2" value="{{$employee->user->name}}" placeholder="Enter Name" readonly>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Company Name</label>
                                <select name="company_id" class="form-control">
                                    <option selected disabled> -- select option--</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}" {{$employee->company_id==$company->id?'selected':''}}>{{$company->name}}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                <div class="alert alert-danger">{{ 'select a company' }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Office Location</label>
                                <select name="office_location_id" id="sel_office_location" class="form-control">
                                    <option value="0" selected disabled>-- Office Location --</option>
                                    @foreach($employee->company->officeLocations as $officeLocation)
                                        <option value="{{$officeLocation->id}}" {{ $employee->office_location_id == $officeLocation->id ? 'selected':''}}>{{$officeLocation->title}}</option>
                                    @endforeach
                                </select>
                                @error('office_location_id')
                                    <div class="alert alert-danger">{{ 'select an Office' }}</div>

                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control mb-2" readonly value="{{$employee->user->email}}" placeholder="Enter Email" required>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Mobile</label>
                                <input type="text" name="mobile" class="form-control mb-2" value="{{$employee->mobile}}" placeholder="Enter Mobile" required>
                                @error('mobile')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="number" name="editedby_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>

                            <div class="form-group">
                                <label for="">RF ID</label>
                                <input type="number" name="rfid" class="form-control mb-2" value="{{$employee->rfid}}" placeholder="Enter RF ID">
                                @error('rfid')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="active" class="form-control">
                                    <option value="1" {{$employee->active==1?'selected':''}}>Active</option>
                                    <option value="0" {{$employee->active==0?'selected':''}}>Inctive</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Update Employee">
                        </div>
                    </form>
                </div>
            </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('select[name="company_id"]').on('change', function() {
                // alert('hi');
                var companyID = $(this).val();
                var url = window.location.origin+'/admin/employee/ajax/'+companyID;
                $('#sel_office_location').find('option').not(':first').remove();
                if(companyID) {
                    $.ajax({

                        url: url,

                        type: "GET",

                        dataType: "json",


                        success:function (response) {

                            var len = 0;
                            if (response.data != null) {
                                len = response.data.length;
                            }

                            if (len>0) {
                                for (var i = 0; i<len; i++) {
                                    var id = response.data[i].id;
                                    var title = response.data[i].title;

                                    var option = "<option value='"+id+"'>"+title+"</option>";

                                    $("#sel_office_location").append(option);
                                }
                            }
                        }

                    });

                }

            });

        });
    </script>
@endsection

