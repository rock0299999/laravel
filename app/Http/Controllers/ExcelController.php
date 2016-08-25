<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Excel;

class ExcelController extends Controller
{
	//Excel文件匯出
	public function export(){
		$cellData = [
				['姓名','金額','通路'],
				['10001','1000','99'],
				['10002','2000','92'],
				['10003','3000','95'],
				['10004','4000','89'],
				['10005','5000','96'],
		];
		Excel::create('test',function($excel) use ($cellData){
			$excel->sheet('score', function($sheet) use ($cellData){
				$sheet->rows($cellData);
			});
		})->store('xls')->export('xls');
	}
	
	//Excel文件匯入
	public function import(){
		$filePath = 'storage/exports/ttt.xls';
		Excel::load($filePath, function($reader) {
			$excelData = $reader->all();
			//dd($excelData);
			foreach ( $excelData as $v){
				$data = [];
				/* 方法一 寫死
				$data ['test1'] = $v->test1;
				$data ['test2'] = $v->test2;
				$data ['test3'] = $v->test3;
				$data ['test4'] = $v->test4;
				$data ['test5'] = $v->test5;
				$data ['test6'] = $v->test6;
				$data ['test7'] = $v->test7;
				$data ['test8'] = $v->test8;
				$data ['test9'] = $v->test9;
				$data ['test10'] = $v->test10;
				*/
				/*for ($i=1;$i<=10;$i++){ //方法二  跑十個欄位
					//echo $i;
					$vv = 'test'.$i;
					$data [$vv]  = ($v->$vv)?$v->$vv:"";
					//echo $data [$vv]  = ($v->$vv)?$v->$vv:"";
					//echo "<BR>";
					//dump( $data ['test'.$i] ."<br>");
				}*/
				//方法三 隨便他跑
				foreach ( $v as $kk => $vv){
					$data[$kk] = ($vv)?$vv:"";
				}				
				DB::table ( 'test' )->insert ( $data );
				//dump($data);
			}
			
		});		
	}	
}
