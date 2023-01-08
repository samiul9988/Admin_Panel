@extends('user.master')
@section('body')
    <section class="content py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Leaves</h3>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-sm table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="20">SL NO</th>
                                    <th width="100">Action</th>
                                    <th>Leave Start Date </th>
                                    <th>Leave End Date </th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($leaves as $leave)
                                    @php
                                    @endphp
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <a href="{{route('employee-leave.show',$leave->id)}}" class="btn btn-xs btn-outline-info mr-1 float-left"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('employee-leave.edit',$leave->id)}}" class="btn btn-xs btn-outline-primary mr-1 float-left"><i class="fa fa-edit"></i></a>
                                        </td>

                                        <td>{{$leave->leave_start_date}}</td>
                                        <td>{{$leave->leave_end_date}}</td>

                                        <td>
                                            @if($leave->status=='approved')
                                                <span class="badge-success font-weight-bold p-1 rounded-sm">Approved</span>
                                            @elseif($leave->status=='pending')
                                                <span class="badge-primary font-weight-bold p-1 rounded-sm">Pending</span>
                                            @else
                                                <span class="badge-danger font-weight-bold p-1 rounded-sm">Cancelled</span>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection


@section('script')
    <script>
        $('input[name=toogle]').change(function(){
            var mode=$(this).prop('checked');
            var id=$(this).val()
            $.ajax({
                url:"{{route('leave.status')}}",
                type:"POST",
                data:{
                    _token:'{{csrf_token()}}',
                    mode:mode,
                    id:id,
                },
                success:function(response){
                    if(response.status){
                        alert(response.msg);
                    }
                    else{
                        alert('please try again');
                    }
                }
            })
        });
    </script>
@endsection

