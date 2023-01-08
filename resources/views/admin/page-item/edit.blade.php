@extends('admin.master')
@section('body')
            <section class="pt-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Item of Page</h3>
                    </div>


                    <form action="{{route('page-item.update',$page_item->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Page Name</label>
                                <input type="hidden" name="page_id" value="{{$page_item->page_id}}">
                                <input type="text"  class="form-control" value="{{$page_item->page->name}}">
{{--                                <select name="page_id" class="form-control">--}}
{{--                                    <option selected disabled> -- select option--</option>--}}
{{--                                    @foreach($pages as $page)--}}
{{--                                        <option value="{{$page->id}}" {{$page->id==$page_item->page_id?'selected':''}} readonly>{{$page->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
                                @error('page_id')
                                <div class="alert alert-danger">{{ 'select a page' }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Item Name</label>
                                <input type="text" name="name" class="form-control" value="{{$page_item->name}}" placeholder="Enter Page Name">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Item Description</label>
                                <textarea name="description" id="summernote" class="form-control" rows="5">{{$page_item->description}}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="number" name="editedby_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>
                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </section>
@endsection
