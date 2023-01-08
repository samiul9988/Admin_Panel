@extends('admin.master')
@section('body')
            <section class="pt-3">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Create New Office Location</h3>
                    </div>


                    <form action="{{route('office-location.update',$office_location->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" value="{{$office_location->title}}" class="form-control">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Company Name</label>
                                <select name="company_id" id="" class="form-control">
                                    <option selected disabled>--- select company name ---</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}" {{$company->id==$office_location->company_id?'selected':''}}>{{$company->name}}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                <div class="alert alert-danger">{{'Select a company name'}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Division Name</label>
                                <select name="division_id" id="" class="form-control">
                                    <option selected disabled>--- select Division name ---</option>
                                    @foreach($divisions as $division)
                                        <option value="{{$division->id}}" {{$division->id==$office_location->division_id?'selected':''}}>{{$division->name}}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                <div class="alert alert-danger">{{'Select a Division Name'}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">District Name</label>
                                <select name="district_id" id="" class="form-control">
                                    <option selected disabled>--- select District name ---</option>
                                    @foreach($districts as $district)
                                        <option value="{{$district->id}}" {{$district->id==$office_location->district_id?'selected':''}}>{{$district->name}}</option>
                                    @endforeach
                                </select>
                                @error('district_id')
                                <div class="alert alert-danger">{{'Select a District Name'}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Police Station Name</label>
                                <select name="police_station_id" id="" class="form-control">
                                    <option selected disabled>--- select police station name ---</option>
                                    @foreach($police_stations as $police_station)
                                        <option value="{{$police_station->id}}" {{$police_station->id==$office_location->police_station_id?'selected':''}}>{{$police_station->name}}</option>
                                    @endforeach
                                </select>
                                @error('police_station_id')
                                <div class="alert alert-danger">{{'Select a police station Name'}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Google Location</label>
                                <input type="text" name="google_location" value="{{$office_location->google_location}}" class="form-control">
                                @error('google_location')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Latitude</label>
                                <input type="text" name="lat" value="{{$office_location->lat}}" class="form-control">
                                @error('lat')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Longitude</label>
                                <input type="text" name="lng" value="{{$office_location->lng}}" class="form-control">
                                @error('lng')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Office Start Time</label>
                                <input type="time" name="office_start_time" value="{{$office_location->office_start_time}}" class="form-control">
                                @error('office_start_time')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Office End Time</label>
                                <input type="time" name="office_end_time" value="{{$office_location->office_end_time}}" class="form-control">
                                @error('office_end_time')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Feature Image</label>
                                <input type="file" class="form-control-file" name="featured_image" value="{{$office_location->featured_image}}">
                                <img src="{{asset($office_location->featured_image)}}" class="mt-2" alt="{{$office_location->id}}" width="250">

                                @error('featured_image')
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
