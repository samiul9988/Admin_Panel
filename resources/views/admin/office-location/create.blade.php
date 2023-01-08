@extends('admin.master')
@section('body')
            <section class="pt-3">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Create New Office Location</h3>
                    </div>


                    <form action="{{route('office-location.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" value="{{old('title')}}" class="form-control">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Company Name</label>
                                <select name="company_id" id="" class="form-control">
                                    <option disabled selected>--- select company name ---</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                <div class="alert alert-danger">{{'Select a company name'}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Division Name</label>
                                <select name="division_id" id="" class="form-control">
                                    <option disabled selected>--- select Division name ---</option>
                                    @foreach($divisions as $division)
                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                <div class="alert alert-danger" >{{'Select a Division Name'}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">District Name</label>
                                <select name="district_id" id="" class="form-control">
                                    <option disabled selected>--- select District name ---</option>
                                    @foreach($districts as $district)
                                        <option value="{{$district->id}}">{{$district->name}}</option>
                                    @endforeach
                                </select>
                                @error('district_id')
                                <div class="alert alert-danger">{{'Select a District Name'}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Police Station Name</label>
                                <select name="police_station_id" id="" class="form-control">
                                    <option disabled selected>--- select Police Station  name ---</option>
                                    @foreach($police_stations as $police_station)
                                        <option value="{{$police_station->id}}">{{$police_station->name}}</option>
                                    @endforeach
                                </select>
                                @error('police_station_id')
                                <div class="alert alert-danger">{{'Select a police station Name'}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Google Location</label>
                                <input type="text" name="google_location" value="{{old('google_location')}}" class="form-control">
                                @error('google_location')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Latitude</label>
                                <input type="text" name="lat" value="{{old('lat')}}" class="form-control">
                                @error('lat')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Longitude</label>
                                <input type="text" name="lng" value="{{old('lng')}}" class="form-control">
                                @error('lng')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Office Start Time</label>
                                <input type="time" name="office_start_time" value="{{old('office_start_time')}}" class="form-control">
                                @error('office_start_time')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Office End Time</label>
                                <input type="time" name="office_end_time" value="{{old('office_end_time')}}" class="form-control">
                                @error('office_end_time')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Feature Image</label>
                                <input type="file" class="form-control-file" name="featured_image" value="{{old('featured_image')}}">
                                @error('featured_image')
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
