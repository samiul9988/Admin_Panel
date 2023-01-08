@extends('admin.master')
@section('body')
            <section class="pt-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Bulck Upload For Emplyee</h3>
                    </div>


                    <form action="{{route('employee-import.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

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
                                    <option value="0" selected disabled>-- Office Location --</option>
                                </select>
                                @error('office_location_id')
                                <div class="alert alert-danger">{{ 'select an Office' }}</div>
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
                $('#sel_office_location').find('option').not(':first').remove();
                if(companyID) {
                    $.ajax({

                        url: url,
                        {{--url:"{{route('employee.ajax')}}",--}}

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
