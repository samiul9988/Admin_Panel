<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    private static $leave;

    public static function createLeave($request){
        self::saveBasicInfo(new Leave(),$request);
    }

    public static function saveBasicInfo($leave,$request){
        $leave->user_id=$request->user_id;

        if($request->employee_id){
            $leave->employee_id=$request->employee_id;
        }

        $leave->detail=$request->detail;
        $leave->leave_start_date=$request->leave_start_date;
        $leave->leave_end_date=$request->leave_end_date;

        if($request->status){
            $leave->status=$request->status;
            if($request->status=='approved'){
                $leave->approved_at=now();
                $leave->approvedby_id=$request->editedby_id;
            }
            else{
                $leave->approved_at=null;
                $leave->approvedby_id=null;
            }
        }

        if($request->addedby_id){
            $leave->addedby_id=$request->addedby_id;
        }

        if($request->editedby_id){
            $leave->editedby_id=$request->editedby_id;
        }
        $leave->save();
    }

    public static function updateLeave($request,$id){
        self::saveBasicInfo(Leave::find($id),$request);
    }

    public static function destroyLeave($id)
    {
        self::$leave=Leave::find($id);
        self::$leave->delete();
    }


    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}
