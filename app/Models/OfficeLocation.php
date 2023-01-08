<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeLocation extends Model
{
    use HasFactory;
    private static $featureImage,$featureImageName,$directory,$featureImageUrl,$featureImageExtension;
    private static $officeLocation;

    public static function getImageUrl($request){
        if($request->file('featured_image')){
            self::$featureImage=$request->file('featured_image');
            self::$featureImageExtension=self::$featureImage->getClientOriginalExtension();
            self::$featureImageName=time().'.'.self::$featureImageExtension;
            self::$directory='admin/images/office-location/';
            self::$featureImage->move(self::$directory,self::$featureImageName);
            return self::$directory.self::$featureImageName;
        }
        else{
            return "";
        }

    }

    public static function createOfficeLocation($request){
        self::saveBasicInfo(new OfficeLocation(),$request,self::getImageUrl($request));
    }

    public static function saveBasicInfo($officeLocation,$request,$getImage){
        $officeLocation->title=$request->title;
        $officeLocation->company_id=$request->company_id;
        $officeLocation->division_id=$request->division_id;
        $officeLocation->district_id=$request->district_id;
        $officeLocation->police_station_id=$request->police_station_id;


        $officeLocation->google_location=$request->google_location;
        $officeLocation->lat=$request->lat;
        $officeLocation->lng=$request->lng;
        $officeLocation->office_start_time=$request->office_start_time;
        $officeLocation->office_end_time=$request->office_end_time;

        if($request->addedby_id){
            $officeLocation->addedby_id=$request->addedby_id;
        }

        if($request->editedby_id){
            $officeLocation->editedby_id=$request->editedby_id;
        }

        $officeLocation->featured_image=$getImage;

        $officeLocation->save();
    }

    public static function updateOfficeLocation($request,$id){
        self::$officeLocation=OfficeLocation::find($id);
        if ($request->file('featured_image')){
            if (file_exists(self::$officeLocation->featured_image)){
                unlink(self::$officeLocation->featured_image);
            }
            self::$featureImageUrl=self::getImageUrl($request);
        }
        else{
            self::$featureImageUrl=self::$officeLocation->featured_image;
        }

        self::saveBasicInfo(self::$officeLocation,$request,self::$featureImageUrl);
    }
    public static function deleteOfficeLocation($id){
        self::$officeLocation=OfficeLocation::find($id);
        if(file_exists(self::$officeLocation->featured_image)){
            unlink(self::$officeLocation->featured_image);
        }
        self::$officeLocation->delete();
    }
    public function company(){
        return $this->belongsTo(Company::class,'company_id','id');
    }
}
