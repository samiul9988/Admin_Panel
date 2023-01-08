<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    private static $employee;

    public static function createEmployee($request){
        self::$employee=new Employee();
        $user=User::find($request->user_id);
        self::$employee->company_id=$request->company_id;
        self::$employee->user_id=$request->user_id;
        self::$employee->employee_id=$request->employee_id;
        self::$employee->office_location_id=$request->office_location_id;
        self::$employee->name=$user->name;
        self::$employee->designation=$request->designation;
        self::$employee->gender=$request->gender;
        self::$employee->email=$user->email;
        self::$employee->mobile=$request->mobile;
        self::$employee->addedby_id=$request->addedby_id;
        self::$employee->rfid=$request->rfid;
        self::$employee->save();
    }
    public static function updateEmployee($request, $id){
//        return $id;
        self::$employee=Employee::find($id);
        self::$employee->company_id=$request->company_id;
        self::$employee->employee_id=$request->employee_id;
        self::$employee->user_id=$request->user_id;
        self::$employee->office_location_id=$request->office_location_id;
        self::$employee->name=$request->name;
        self::$employee->email=$request->email;
        self::$employee->mobile=$request->mobile;
        self::$employee->designation=$request->designation;
        self::$employee->gender=$request->gender;
        if($request->addedby_id){
            self::$employee->addedby_id=$request->addedby_id;
        }
        if($request->editedby_id){
            self::$employee->editedby_id=$request->editedby_id;
        }
        self::$employee->rfid=$request->rfid;
        self::$employee->save();
    }

    public static function deleteEmployee($id){
        self::$employee=Employee::find($id);
        self::$employee->delete();
    }

    public function company(){
        return $this->belongsTo(Company::class,'company_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
