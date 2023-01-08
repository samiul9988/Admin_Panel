@extends('admin.master')
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
                                    <th>User Name</th>
                                    <th>Employee Id</th>
                                    <th>Leave (Start - End) Date </th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($leaves as $leave)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <a href="{{route('leave.show',$leave->id)}}" class="btn btn-xs btn-outline-info mr-1 float-left"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('leave.edit',$leave->id)}}" class="btn btn-xs btn-outline-primary mr-1 float-left"><i class="fa fa-edit"></i></a>

                                            <form action="{{route('leave.destroy',$leave->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-xs btn-outline-danger mr-1 float-left"><i class="fa fa-trash"></i></button>

                                            </form>
                                        </td>
                                        <td>{{$leave->user->name}}</td>

                                        @if(isset($leave->employee_id))
                                            <td>{{$leave->employee_id}}</td>
                                        @else
                                            <td> </td>
                                        @endif

                                        <td>{{$leave->leave_start_date}} <span class="font-weight-bold text-danger">--</span> {{$leave->leave_end_date}}</td>
{{--                                        @if($leave->status=='approved' || $leave->status=='pending'))--}}
                                        @if($leave->status !='cancelled')
                                            <td>
                                                <input type="checkbox" name="toogle" value="{{$leave->id}}" data-toggle="toggle" data-size="sm" {{$leave->status=='approved' ? 'checked' : '' }} data-on="Approved"  data-off="Pending" data-onstyle="success" data-offstyle="primary">
                                            </td>
                                        @else
                                        <td> <span class="badge-danger font-weight-bold p-1 rounded-sm">Cancelled</span></td>
                                        @endif

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

