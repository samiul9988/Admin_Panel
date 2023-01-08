<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    private static $company;

    public static function createCompany($request){
        self::$company=new Company();
        self::$company->name=$request->name;
        self::$company->address=$request->address;
        self::$company->addedby_id=$request->addedby_id;


        self::$company->save();
    }
    public static function updateCompany($request, $id){
        self::$company=Company::find($id);

        self::$company->name=$request->name;
        self::$company->address=$request->address;
        self::$company->active=$request->active;
        self::$company->editedby_id=$request->editedby_id;

        self::$company->save();
    }

    public static function deleteCompany($id){
        self::$company=Company::find($id);
        self::$company->delete();
    }
    public function officeLocations(){
        return $this->hasMany(OfficeLocation::class,'company_id','id');
    }
}
