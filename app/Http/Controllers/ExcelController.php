<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

//use App\Http\Controllers\Controller;

use Excel;

class ExcelController extends Controller
{
	public function index(){
		return view('excel.index');
	}
	
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
		$this->rtndata ['status'] = 0;
		
		if (Input::hasFile('file')) {
			//取得檔案路徑
			$filePath = Input::file('file')->getRealPath();			
		} else {
			$this->rtndata ['message'] = '檔案不存在';
			return response ()->json ( $this->rtndata );
		}		

		Excel::load($filePath, function($reader) {
			$excelData = $reader->all();

			foreach ( $excelData as $v){
				$data = [];
				//迴圈丟進data
				foreach ( $v as $kk => $vv){
					$data[$kk] = ($vv)?$vv:"";
				}
				DB::table ( 'test' )->insert ( $data );
			}
			
			$this->rtndata ['status'] = 1;
			$this->rtndata ['message'] = "確認";
		});
			
		return response ()->json ( $this->rtndata );
	}
}
