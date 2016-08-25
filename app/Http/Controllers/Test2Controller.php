<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

class Test2Controller extends Controller
{
    //
	public function index(){
		$year = 2016;
		$month = 8;
		$day =1;

		$timezone = 'Asia/Taipei';
		
		// 從「年月日」建立
		echo Carbon::createFromDate($year, $month, $day, $timezone);
		//echo Carbon::createFromTimeStamp(-1)->toDateTimeString();
		exit; 
		// 從「時分秒」建立
		Carbon::createFromTime($hour, $minute, $second, $timezone);
		
		// 從完整的「年月日時分秒」建立
		Carbon::create($year, $month, $day, $hour, $minute, $second, $timezone);
		
		// 從指定的格式建立
		Carbon::createFromFormat($format, $time, $tz);
		echo Carbon::createFromFormat('Y-m-d H', '1975-05-21 22')->toDateTimeString(); // 1975-05-21 22:00:00
		
		// 從時間戳記建立
		echo Carbon::createFromTimeStamp(-1)->toDateTimeString();                        // 1969-12-31 18:59:59
		echo Carbon::createFromTimeStamp(-1, 'Europe/London')->toDateTimeString();       // 1970-01-01 00:59:59
		echo Carbon::createFromTimeStampUTC(-1)->toDateTimeString();                     // 1969-12-31 23:59:59
		
		return view('welcome')->with ( 'timezone', $timezone );
	}
}
