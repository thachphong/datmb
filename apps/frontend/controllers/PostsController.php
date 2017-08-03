<?php

namespace Multiple\Frontend\Controllers;

use Multiple\PHOClass\PHOController;
use Multiple\Models\Posts;
use Multiple\Models\Tags;
use Multiple\Models\CheckView;
use Multiple\Models\Provincial;
use Multiple\Models\District;
use Multiple\Models\Ward;
use Multiple\Models\Street;
use Multiple\Models\Directional;
use Multiple\Models\Unit;
use Multiple\Models\Category;
class PostsController extends PHOController
{

	public function indexAction($id)
	{
		
		//$ip = $this->get_client_ip_server();
		//$db_v =new  CheckView();
		$result['categorys'] = Category::get_all();
		$result['provincials'] = Provincial::get_all();
		$result['districts'] = District::find();
		$result['wards'] = Ward::find();
		$result['streets'] = Street::find();
		$result['directionals'] = Directional::find();
		$result['units'] = Unit::find();
		$result['folder_tmp'] = uniqid("",true);
		$this->set_template_share();
		$this->ViewVAR($result);	
	}
	public function viewAction($id)
	{
		$url =  $this->request->getURI();
        $abc =1;
       // $post_data= Posts::findFirst
	}
	function get_client_ip_server() {
	    $ipaddress = '';
	    if ($_SERVER['HTTP_CLIENT_IP'])
	        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else if($_SERVER['HTTP_X_FORWARDED'])
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	    else if($_SERVER['HTTP_FORWARDED_FOR'])
	        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	    else if($_SERVER['HTTP_FORWARDED'])
	        $ipaddress = $_SERVER['HTTP_FORWARDED'];
	    else if($_SERVER['REMOTE_ADDR'])
	        $ipaddress = $_SERVER['REMOTE_ADDR'];
	    else
	        $ipaddress = 'UNKNOWN';
	 
	    return $ipaddress;
	}
	public static function uploadAction(){
		$param = $_FILES;
		$result['status']='OK';
		if(count($param)==0){
			$result['status']='NOT';
			$result['msg']='Không có file nào được chọn !';
		}
		$file_lb = new FilePHP();
		foreach($param as $item){
			$name = $item['name'];
			$size = $item['size'];
			$file_tmp = $item['tmp_name'];			
			$folder_name = date('Ym');
			if(is_dir(DATA_TMP_PATH.'/'.$folder_name)==false){
				 @mkdir(DATA_TMP_PATH.'/'.$folder_name, 0777, true);
			}
			$folder_name .='/'. date('d');
			if(is_dir(DATA_TMP_PATH.'/'.$folder_name)==false){
				 @mkdir(DATA_TMP_PATH.'/'.$folder_name, 0777, true);
			}
			$img_name = uniqid().'.'.$file_lb->GetExtensionName($name);
			$file_name =$folder_name.'/'. $img_name;
			$file_lb->CopyFile($file_tmp,DATA_TMP_PATH.'/'.$file_name);
			$img_thumb = self::thumb_image($img_name,IMG_THUMB_SIZE_WIDTH,IMG_THUMB_SIZE_HEIGHT,DATA_TMP_PATH.'/'.$folder_name.'/');
			$file_lb->DeleteFile($file_tmp);
			$result['link'][] = str_replace($img_name,$img_thumb,ACW_BASE_URL_DATA_TMP.$file_name);
		}
		
		return ACWView::json($result);
	}
}
