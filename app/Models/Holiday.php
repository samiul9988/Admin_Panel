<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;
    private static $holiday;

    public static function createHoliday($request){
//        $date = Carbon::createFromFormat('Y-m-d', $request->date);
//        $month_day = $date->format('m-d');
        self::$holiday=new Holiday();
//        self::$holiday->date=$month_day;
        self::$holiday->date=$request->date;
        self::$holiday->year=$request->year;
        self::$holiday->purpose=$request->purpose;
        self::$holiday->addedby_id=$request->addedby_id;

        self::$holiday->save();
    }
    public static function updateHoliday($request, $id){
        self::$holiday=Holiday::find($id);
        self::$holiday->date = $request->date;
        self::$holiday->year=$request->year;
        self::$holiday->purpose=$request->purpose;
        self::$holiday->editedby_id=$request->editedby_id;

        self::$holiday->save();
    }

    public static function deleteHoliday($id){
        self::$holiday=Holiday::find($id);
        self::$holiday->delete();
    }
}
