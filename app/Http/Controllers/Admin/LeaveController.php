<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\OfficeLocation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('leaves','allLeaves');
        return view('admin.leave.index',['leaves'=>Leave::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        menuSubmenu('leaves','createLeave');
        return view('admin.leave.create',[
            'users'=>User::all(),
            'employees'=>Employee::all()
            ]);
    }

    public function leaveStatus(Request $request){

        if($request->mode=='true'){
            DB::table('leaves')->where('id',$request->id)->update([
                'status'=>'approved',
                'approved_at'=>now(),
                'approvedby_id'=>auth()->user()->id,
                ]);
        }
        else{
//            dd($request->all());
            DB::table('leaves')->where('id',$request->id)->update([
                'status'=>'pending',
                'approved_at'=>null,
                'approvedby_id'=>null,
            ]);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>true]);
    }

    public function employeeName($userId){
        $employee= Employee::where('user_id', $userId)->get();
        return response()->json(['data' => $employee]);
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
            'user_id'=>'required',
            'leave_start_date'=>'required',
            'leave_end_date'=>'required',
        ]);

        Leave::createLeave($request);
        menuSubmenu('leaves','createLeave');
        return redirect()->route('leave.create')->with('success','Successfully Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        menuSubmenu('leaves','allLeaves');
        return view('admin.leave.view',[
            'leave'=>Leave::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        menuSubmenu('leaves','allLeaves');
        return view('admin.leave.edit',[
            'users'=>User::all(),
            'leave'=>Leave::find($id)]);
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
        $this->validate($request,[
            'user_id'=>'required',
            'leave_start_date'=>'required',
            'leave_end_date'=>'required',
        ]);

        Leave::updateLeave($request,$id);
        menuSubmenu('leaves','allLeaves');
        return redirect()->route('leave.index')->with('success','Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Leave::destroyLeave($id);
        menuSubmenu('leaves','allLeaves');
        return redirect()->route('leave.index')->with('success','Successfully Deleted');
    }
}
