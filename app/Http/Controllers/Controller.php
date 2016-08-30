<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Eloquent\Files;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /*
     *
     */
    protected function get_full_url() {
    	$https = ! empty ( $_SERVER ['HTTPS'] ) && strcasecmp ( $_SERVER ['HTTPS'], 'on' ) === 0 || ! empty ( $_SERVER ['HTTP_X_FORWARDED_PROTO'] ) && strcasecmp ( $_SERVER ['HTTP_X_FORWARDED_PROTO'], 'https' ) === 0;
    	return ($https ? 'https://' : 'http://') . (! empty ( $_SERVER ['REMOTE_USER'] ) ? $_SERVER ['REMOTE_USER'] . '@' : '') . (isset ( $_SERVER ['HTTP_HOST'] ) ? $_SERVER ['HTTP_HOST'] : ($_SERVER ['SERVER_NAME'] . ($https && $_SERVER ['SERVER_PORT'] === 443 || $_SERVER ['SERVER_PORT'] === 80 ? '' : ':' . $_SERVER ['SERVER_PORT']))) . substr ( $_SERVER ['SCRIPT_NAME'], 0, strrpos ( $_SERVER ['SCRIPT_NAME'], '/' ) );
    }    
    
    //圖片上傳類
    public function _uploadFile($filedata, $type = "image") {
    	switch ($type) {
    		case "image" :
    			$img = explode ( ',', $filedata );
    			$data = base64_decode ( $img [1] );
    			//$path = config ()->get ( 'config.path.userdata' ) . session ()->get ( 'usercode' ) . "/" . date ( "Ymd" ) . "/";
    			$path = "upload/userdata/" . "/" . date ( "Ymd" ) . "/";
    			if (! file_exists ( $path )) {
    				mkdir ( $path, 0777, true );
    			}
    			$filename = uniqid () . '.jpg';
    			$success = file_put_contents ( $path . $filename, $data );
    			if ($success) {
    				$Dao = new Files ();
    				$Dao->iUserId = time();
    				$Dao->vFileType = filetype ( $path . $filename );
    				$Dao->vFileServer = $this->get_full_url () . "/";
    				$Dao->vFilePath = $path;
    				$Dao->vFileName = $filename;
    				$Dao->iFileSize = filesize ( $path . $filename );
    				$Dao->iDateTime = time ();
    				if ($Dao->save ()) {
    					$fileid = $Dao->iId;
    				}
    			}
    			break;
    		default :
    			break;
    	}
    	return $fileid;
    }
}
