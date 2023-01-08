@extends('admin.master')
@section('body')
            <section class="pt-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Company</h3>
                    </div>


                    <form action="{{route('company.update',$company->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control mb-2" value="{{$company->name}}" placeholder="Enter Name">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="active" class="form-control">
                                    <option value="1" {{$company->active==1?'selected':''}}>Active</option>
                                    <option value="0" {{$company->active==0?'selected':''}}>Inctive</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <input type="number" name="editedby_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>

                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control mb-2" value="{{$company->address}}" placeholder="Enter Address">
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Update Company">
                        </div>
                    </form>
                </div>
            </section>
@endsection
