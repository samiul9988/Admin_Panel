<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use App\Models\OfficeLocation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('employees', 'allEmployees');
        return view('admin.employee.index',['employees'=>Employee::all()]);
    }

    public function companyLocation($companyId){
//        dd($companyId);

        $office_locations= OfficeLocation::where('company_id', $companyId)->get();
        return response()->json(['data' => $office_locations]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        menuSubmenu('employees', 'createEmployee');
        return view('admin.employee.create',[
            'companies'=>Company::all(),
            'users'=>User::all(),
//            'office_locations'=>OfficeLocation::all()
        ]);
    }
    public function user($userID){
//        dd($userID);
        menuSubmenu('users', 'allUsers');
        return view('admin.user.index',['user'=>User::find($userID)]);
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
            'company_id'=>'required',
            'user_id'=>'required',
            'mobile'=>'nullable',
            'designation'=>'required',
            'gender'=>'required',
            'employee_id'=>'required|unique:employees,employee_id',
        ]);
        Employee::createEmployee($request);

        menuSubmenu('employees', 'createEmployee');
        return redirect()->route('employee.create')->with('success','Successfully Created Company');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        menuSubmenu('employees', 'allEmployees');
        return view('admin.employee.view',['employee'=>Employee::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $employee=Employee::find($id);
//        dd($employee->office_location_id);
//        dd($employee->company->officeLocations);
        menuSubmenu('employees', 'allEmployees');
        return view('admin.employee.edit',[
            'employee'=>Employee::find($id),
            'companies'=>Company::all(),
            'users'=>User::all()
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
            'company_id'=>'required',
            'mobile'=>'nullable',
//            'employee_id'=>'required',
            'employee_id'=>Rule::unique('employees')->ignore(Employee::find($id)),
        ]);
        Employee::updateEmployee($request,$id);
//        User::nameChangeFromEmployee($request);
        menuSubmenu('employees', 'allEmployees');
        return redirect()->route('employee.index')->with('success','Successfully Updated Employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::deleteEmployee($id);
        menuSubmenu('employees', 'allEmployees');
        return redirect()->route('employee.index')->with('success','Successfully Deleted Employee');
    }
}
