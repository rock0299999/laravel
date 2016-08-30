<?php

namespace App\Http\Controllers\Results;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Eloquent\SysNav;

class IndexController extends Controller {
	public $type = 3;
	/*
	 *
	 */
	/*public function __construct() {
		parent::__construct ();
	}*/
	
	/*
	 *
	 */
	public function index() {
		//$this->func = "index.web.results";
		//$this->__initial ();
		//return $this->view;
		return view('results.index');
	}
	
	/*
	 *
	 */
	public function add() {
		/*if (! session ()->has ( 'userid' )) {
			return redirect ( 'web/login' );
		}*/
		//$this->func = "index.web.results.add";
		//$this->__initial ();
		//return $this->view;
		$users = SysNav::all();
		return view('results.add');
	}
	
	/*
	 *
	 */
	public function doAdd() {
		$map ['iType'] = $this->type;
		$maxRank = SysNav::where ( $map )->max ( 'iRank' );

		$Dao = new SysNav ();

		$Dao->iType = $this->type;
		$Dao->vTitle = (Input::has ( 'vTitle' )) ? Input::get ( 'vTitle' ) : "";
		$Dao->iDate = (Input::has ( 'vTitle' )) ? strtotime ( Input::get ( 'vTitle' ) ) : time ();
		
		$Dao->vImage = $this->_uploadFile ( Input::get ( 'vImage' ) );

		$Dao->vSummary = (Input::has ( 'vSummary' )) ? Input::get ( 'vSummary' ) : "";
		$Dao->vDetail = (Input::has ( 'vDetail' )) ? Input::get ( 'vDetail' ) : "";
		$Dao->bShow = (Input::has ( 'bShow' )) ? Input::get ( 'bShow' ) : 0;
		$Dao->bOpen = (Input::has ( 'bOpen' )) ? Input::get ( 'bOpen' ) : 0;
		$Dao->bTop = (Input::has ( 'bTop' )) ? Input::get ( 'bTop' ) : 0;
		$Dao->iCreateTime = $Dao->iUpdateTime = time ();
		$Dao->iRank = $maxRank + 1;
		
		if ($Dao->save ()) {
			$this->rtndata ['id'] = $Dao->iId;
			$this->rtndata ['status'] = 1;
			$this->rtndata ['message'] = '新增成功';
		} else {
			$this->rtndata ['status'] = 0;
			$this->rtndata ['message'] = '新增失敗';
		}
		$this->rtndata ['status'] = 1;
		return response ()->json ( $this->rtndata );
	}
	
	/*
	 *
	 */
	public function edit() {
		if (! session ()->has ( 'userid' )) {
			return redirect ( 'web/login' );
		}
		$this->func = "index.web.results.edit";
		$this->__initial ();
		
		$id = (Input::has ( 'id' )) ? Input::get ( 'id' ) : 0;
		$info = SysNav::find ( $id );
		if (! $info) {
			return redirect ( 'index/web/results' );
		}
		$info->vImageUrl = $this->_getFilePathById ( $info->vImage );
		$info->vDate = date ( 'Y/m/d', $info->iDate );
		session ()->put ( 'nav.results.id', $id );
		$this->view->with ( 'info', $info );
		return $this->view;
	}
	
	/*
	 *
	 */
	public function doSave() {
		$map ['iId'] = (Input::has ( 'id' )) ? Input::get ( 'id' ) : 0;
		$map ['iType'] = $this->type;
		$Dao = SysNav::where ( $map )->first ();
		if (! $Dao) {
			$this->rtndata ['status'] = 0;
			$this->rtndata ['message'] = trans ( '_web_message.ticket.web.mall.product.edit.fail' );
			return response ()->json ( $this->rtndata );
		}
		if (Input::has ( 'vTitle' )) {
			$Dao->vTitle = Input::get ( 'vTitle' );
		}
		if (Input::has ( 'vDate' )) {
			$Dao->iDate = strtotime ( Input::get ( 'vDate' ) );
		}
		if (Input::has ( 'vSummary' )) {
			$Dao->vSummary = Input::get ( 'vSummary' );
		}
		if (Input::has ( 'vImage' )) {
			$Dao->vImage = $this->_uploadFile ( Input::get ( 'vImage' ) );
		}
		if (Input::has ( 'vUrl' )) {
			$Dao->vUrl = Input::get ( 'vUrl' );
		}
		if (Input::has ( 'iDate' )) {
			$Dao->iDate = strtotime ( Input::get ( 'iDate' ) );
		}
		if (Input::has ( 'vDetail' )) {
			$Dao->vDetail = Input::get ( 'vDetail' );
		}
		if (Input::has ( 'bShow' )) {
			$Dao->bShow = Input::get ( 'bShow' );
		}
		if (Input::has ( 'bOpen' )) {
			$Dao->bOpen = Input::get ( 'bOpen' );
		}
		if (Input::has ( 'bTop' )) {
			$Dao->bTop = Input::get ( 'bTop' );
		}
		$Dao->iUpdateTime = time ();
		if ($Dao->save ()) {
			$this->rtndata ['status'] = 1;
			$this->rtndata ['message'] = trans ( '_web_message.ticket.web.mall.product.edit.success' );
		} else {
			$this->rtndata ['status'] = 0;
			$this->rtndata ['message'] = trans ( '_web_message.ticket.web.mall.product.edit.fail' );
		}
		return response ()->json ( $this->rtndata );
	}
	
	/*
	 *
	 */
	public function doDelete() {
		$id = (Input::has ( 'id' )) ? Input::get ( 'id' ) : 0;
		$Dao = SysNav::find ( $id );
		if (! $Dao) {
			$this->rtndata ['status'] = 0;
			$this->rtndata ['message'] = trans ( '_web_message.ticket.web.mall.product.del.fail' );
			return response ()->json ( $this->rtndata );
		}
		$Dao->bDel = 1;
		if ($Dao->save ()) {
			$this->rtndata ['status'] = 1;
			$this->rtndata ['message'] = trans ( '_web_message.ticket.web.mall.product.del.success' );
		} else {
			$this->rtndata ['status'] = 0;
			$this->rtndata ['message'] = trans ( '_web_message.ticket.web.mall.product.del.fail' );
		}
		$this->rtndata ['status'] = 1;
		return response ()->json ( $this->rtndata );
	}
	
	/*
	 *
	 */
	public function getList() {
		$map ['iType'] = $this->type;
		$map ['bDel'] = 0;
		$data_arr = SysNav::where ( $map )->get ();
		foreach ( $data_arr as $key => $var ) {
			$data = [ ];
			$data ['DT_RowId'] = $var->iId;
			$data ['iId'] = $var->iId;
			$data ['vImage'] = $this->_getFilePathById ( $var->vImage );
			$data ['vTitle'] = $var->vTitle;
			$data ['bShow'] = $var->bShow;
			$data ['bOpen'] = $var->bOpen;
			$data ['iStatus'] = $var->iStatus;
			$item [] = $data;
		}
		
		$this->rtndata ['status'] = 1;
		$this->rtndata ['aaData'] = (isset ( $item )) ? $item : [ ];
		return response ()->json ( $this->rtndata );
	}
}
