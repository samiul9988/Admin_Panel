<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('companies', 'allCompanies');
        return view('admin.company.index',['companies'=>Company::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        menuSubmenu('companies', 'createCompany');
        return view('admin.company.create');
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
            'name'=>'string|required',
            'adress'=>'string|nullable',
        ]);
        Company::createCompany($request);
        menuSubmenu('companies', 'createCompany');
        return redirect()->route('company.create')->with('success','Successfully Created Company');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        menuSubmenu('companies', 'allCompanies');
        return view('admin.company.view',['company'=>Company::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        menuSubmenu('companies', 'allCompanies');
        return view('admin.company.edit',['company'=>Company::find($id)]);

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
            'name'=>'string|required',
            'adress'=>'string|nullable',
        ]);
        Company::updateCompany($request,$id);
        menuSubmenu('companies', 'allCompanies');
        return redirect()->route('company.index')->with('success','Successfully Updated Company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::deleteCompany($id);
        menuSubmenu('companies', 'allCompanies');
        return redirect()->route('company.index')->with('success','Successfully Deleted Company');
    }
}
