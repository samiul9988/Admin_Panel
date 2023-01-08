<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Company;
use App\Models\OfficeLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfficeLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('office_locations','allOfficeLocations');
        return view('admin.office-location.index',[
            'office_locations'=>OfficeLocation::all(),
        ]);
    }

    public function officeLocationActive(Request $request){
        if($request->mode=='true'){
            DB::table('office_locations')->where('id',$request->id)->update(['active'=>1]);
        }
        else{
            DB::table('office_locations')->where('id',$request->id)->update(['active'=>0]);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>true]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        menuSubmenu('office_locations','createOfficeLocation');
        return view('admin.office-location.create',[
            'companies'=>Company::all(),
            'divisions'=>Company::all(),
            'districts'=>Company::all(),
            'police_stations'=>Company::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->all();
        $this->validate($request,[
            'title'=>'nullable',
            'company_id'=>'nullable',
            'division_id'=>'nullable',
            'district_id'=>'nullable',
            'police_station_id'=>'nullable',
            'google_location'=>'nullable',
            'lat'=>'nullable',
            'lng'=>'nullable',
            'office_start_time'=>'nullable',
            'office_end_time'=>'nullable',
            'featured_image' => 'nullable|image|mimes:jpeg,webp,jpg,png',
        ]);
        OfficeLocation::createOfficeLocation($request);
        menuSubmenu('office_locations','createOfficeLocation');
        return redirect()->route('office-location.create')->with('success','Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        menuSubmenu('office_locations','allOfficeLocations');
        return view('admin.office-location.view',[
            'office_location'=>OfficeLocation::find($id),
            'companies'=>Company::all(),
            'divisions'=>Company::all(),
            'districts'=>Company::all(),
            'police_stations'=>Company::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        menuSubmenu('office_locations','allOfficeLocations');
        return view('admin.office-location.edit',[
            'office_location'=>OfficeLocation::find($id),
            'companies'=>Company::all(),
            'divisions'=>Company::all(),
            'districts'=>Company::all(),
            'police_stations'=>Company::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        return $request->all();
        $this->validate($request,[
            'title'=>'nullable',
            'company_id'=>'nullable',
            'division_id'=>'nullable',
            'district_id'=>'nullable',
            'police_station_id'=>'nullable',
            'google_location'=>'nullable',
            'lat'=>'nullable',
            'lng'=>'nullable',
            'office_start_time'=>'nullable',
            'office_end_time'=>'nullable',
            'featured_image' => 'nullable|image|mimes:jpeg,webp,jpg,png',
        ]);
        OfficeLocation::updateOfficeLocation($request,$id);
        menuSubmenu('office_locations','allOfficeLocations');
        return redirect()->route('office-location.index')->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OfficeLocation::deleteOfficeLocation($id);
        menuSubmenu('office_locations','allOfficeLocations');
        return redirect()->route('office-location.index')->with('success','Successfully Deleted');
    }
}
