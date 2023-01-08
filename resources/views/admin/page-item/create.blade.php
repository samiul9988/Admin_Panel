@extends('admin.master')
@section('body')
            <section class="pt-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Item of Page</h3>
                    </div>


                    <form action="{{route('page-item.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Page Name</label>
                                <select name="page_id" class="form-control">
                                    <option selected disabled> -- select option--</option>
                                    @foreach($pages as $page)
                                        <option value="{{$page->id}}">{{$page->name}}</option>
                                    @endforeach
                                </select>
                                @error('page_id')
                                <div class="alert alert-danger">{{ 'select a page' }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Item Name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Page Name">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Item Description</label>
                                <textarea name="description" id="summernote" class="form-control" rows="5">{{old('description')}}</textarea>
{{--                                <input type="text" name="description" class="form-control" value="{{old('description')}}" placeholder="Enter Description">--}}
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="number" name="addedby_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>
                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </section>
@endsection
