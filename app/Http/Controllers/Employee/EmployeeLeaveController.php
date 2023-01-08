<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('emp_leaves','allEmpLeaves');
        return view('employee.leave.index',[
            'leaves'=>Leave::where('user_id',auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        menuSubmenu('emp_leaves','createEmpLeave');
        return view('employee.leave.create',[
            'user'=>User::find(auth()->user()->id)
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

        $this->validate($request,[
            'detail'=>'string|required',
            'leave_start_date'=>'required',
            'leave_end_date'=>'required',
        ]);
//        return $request->all();
        menuSubmenu('emp_leaves','allEmpLeaves');
        Leave::createLeave($request);
        return redirect()->route('employee-leave.index')->with('success','Successfully Added Your Application');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        menuSubmenu('emp_leaves','allEmpLeaves');
        return view('employee.leave.view',['leave'=>Leave::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        menuSubmenu('emp_leaves','allEmpLeaves');
        return view('employee.leave.edit',['leave'=>Leave::find($id),'user'=>User::find(auth()->user()->id)]);
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
            'detail'=>'string|required',
            'leave_start_date'=>'required',
            'leave_end_date'=>'required',
        ]);
        menuSubmenu('emp_leaves','allEmpLeaves');
        Leave::updateLeave($request,$id);
        return redirect()->route('employee-leave.index')->with('success','Successfully Updated Your Application');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
