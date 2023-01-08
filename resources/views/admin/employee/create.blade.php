@extends('admin.master')
@section('body')
            <section class="pt-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Employee</h3>
                    </div>


                    <form action="{{route('employee.store')}}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="">User Name</label>
                                <select name="user_id"  class="form-control">
                                    <option selected disabled> -- select option--</option>
                                    @foreach($users as $user)
                                        @if($user->employee)

                                        @else
                                            <option value="{{$user->id}}">{{$user->name}} , {{$user->email}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('user_id')
                                <div class="alert alert-danger">{{ 'select a user' }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Designation</label>
                                <input type="text" class="form-control" name="designation" value="{{old('designation')}}">
                                @error('designation')
                                <div class="alert alert-danger mb-2">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="mr-2" for="">Gender :</label>
                                    <input type="checkbox" name="gender" value="male"> <label class="mr-1">Male</label>
                                    <input type="checkbox" name="gender" value="female"> <label class="mr-1">Female</label>
                                    <input type="checkbox" name="gender" value="other"> <label class="mr-1">Other</label>
                                @error('gender')
                                <div class="alert alert-danger mb-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Employee Id</label>
                                <input type="number" class="form-control" name="employee_id" value="{{old('employee_id')}}">
                                @error('employee_id')
                                <div class="alert alert-danger mb-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Company Name</label>
                                <select name="company_id" class="form-control">
                                    <option selected disabled> -- select option--</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                <div class="alert alert-danger">{{ 'select a company' }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Office Location</label>
                                <select name="office_location_id" id="sel_office_location" class="form-control">
{{--                                    <option selected disabled> -- select option--</option>--}}
{{--                                    @foreach($office_locations as $office_location)--}}
{{--                                        <option value="{{$office_location->id}}">{{$office_location->title}}</option>--}}
{{--                                    @endforeach--}}
                                    <option value="0" selected disabled>-- Office Location --</option>


                                </select>
                                @error('office_location_id')
                                <div class="alert alert-danger">{{ 'select an Office' }}</div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label for="">Mobile</label>
                                <input type="text" name="mobile" class="form-control mb-2" value="{{old('mobile')}}" placeholder="Enter Mobile">
                                @error('mobile')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="number" name="addedby_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>

                            <div class="form-group">
                                <label for="">RF ID</label>
                                <input type="number" name="rfid" class="form-control mb-2" value="{{old('rfid')}}" placeholder="Enter RF ID">
                                @error('rfid')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Create New Employee">
                        </div>
                    </form>
                </div>
            </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('select[name="company_id"]').on('change', function() {
                var companyID = $(this).val();
                var url = window.location.origin+'/admin/employee/ajax/'+companyID;

                // alert(url);

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
                            console.log(response.data)
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
