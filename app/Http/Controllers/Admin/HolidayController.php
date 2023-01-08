<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('holidays', 'allHolidays');
        return view('admin.holiday.index',['holidays'=>Holiday::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        menuSubmenu('holidays', 'createHoliday');
        return view('admin.holiday.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Holiday::createHoliday($request);
        menuSubmenu('holidays', 'createHoliday');
        return redirect()->route('holiday.create')->with('message','Create Successfully Holiday');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        menuSubmenu('holidays', 'allHolidays');
        return view('admin.holiday.view',['holiday'=>Holiday::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        menuSubmenu('holidays', 'allHolidays');
        return view('admin.holiday.edit',['holiday'=>Holiday::find($id)]);
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
        Holiday::updateHoliday($request,$id);
        menuSubmenu('holidays', 'allHolidays');
        return redirect()->route('holiday.index')->with('message','Updated Successfully Holiday');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Holiday::deleteHoliday($id);
        menuSubmenu('holidays', 'allHolidays');
        return redirect()->route('holiday.index')->with('message','Deleted Successfully Holiday');
    }
}
