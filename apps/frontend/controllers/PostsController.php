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
use Multiple\Library\FilePHP;
use Multiple\PHOClass\PhoLog;
class PostsController extends PHOController
{

	public function indexAction($id)
	{
			
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
	public function updateAction(){
		$param = $_POST;
		PhoLog::debug_var('test----',$param);
		$result = array('status' => 'OK');
		$result['status'] = 'OK';	
		$result['msg'] = 'Cập nhật thành công!';		
		$db = new Posts();
		$msg = $this->check_validate_update($param);
		if($msg == ""){
			$file = new FilePHP();
			$login_info =  $this->session->get('auth');
        	$param['user_id'] = $login_info->user_id;
       // 	$listfile = $this->get_listfile($param['content']);
			if(strlen($param['post_id'])==0){
				$id = $db->_insert($param);
				//PhoLog::debug_Var('---ssss--',$id);
				// $imglist = $this->move_file($db->add_date,$id,$listfile['tmp']);
				// //PhoLog::debug_Var('---img--',$imglist);
				// $db->content = $this->replace_image_path($imglist,$param['content']);
				// //PhoLog::debug_Var('---img--',$db->content);
				// if(strpos($param['img_path'], 'tmp') !== false){ // file upload mới
				// 	$imglist = $this->move_file($db->add_date,$id,array(0=>$param['img_path']));
				// 	$db->img_path= $imglist[0]['new'];
				// 	//PhoLog::debug_Var('---img--',$db->img_path);
				// }
				//$db->save();

			}else{				
				$obj = $db->get_news($param['news_id']);
				$file_old = $this->get_listfile_old($obj->add_date,$obj->news_id);
				$img_main_path = $this->get_img_main_path($obj->add_date,$obj->news_id);

				$imglist = $this->move_file($obj->add_date,$param['news_id'],$listfile['tmp']);
				$param['content'] = $this->replace_image_path($imglist,$param['content']);
				if(strpos($param['img_path'], 'tmp') !== false){ // file upload mới
					$imglist = $this->move_file($obj->add_date,$param['news_id'],array(0=>$param['img_path']));
					$param['img_path'] = $imglist[0]['new'];
				}else{
					$listfile['main'][]=str_replace($img_main_path.'/', '', $param['img_path'])  ;
				}
				$db->_update($param);	
				//delete file not use
				
				foreach ($file_old as $key => $value) {
					if(in_array($value, $listfile['main']) == false){
						//PhoLog::debug_Var('---img--','delete:'.PHO_PUBLIC_PATH.$img_main_path.'/'.$value);
						$file->DeleteFile(PHO_PUBLIC_PATH.$img_main_path.'/'.$value);
					}
				}			
			}
			$file->DeleteFolder(PHO_PUBLIC_PATH.'tmp/'.$param['folder_tmp']);
			
		}else{
			$result['status'] = 'ER';	
			$result['msg'] = $msg;
		}
		return $this->ViewJSON($result);
	}
	public function check_validate_update(&$param){
		$param['post_no'] = $this->convert_url($param['post_name']);
		return "";
	}
	public function viewAction($id)
	{
		$url =  $this->request->getURI();
        $abc =1;
       // $post_data= Posts::findFirst
	}
	public function get_client_ip_server() {
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
	public function uploadAction(){
		$filelist = $_FILES;
		$param = $this->get_param(array('folder_tmp'));
		$folder_tmp = $param['folder_tmp'];
		//PhoLog::debug_var('--data--',$param);
		//PhoLog::debug_var('--data--',$_POST);
		$result['status']='OK';
		if(count($filelist)==0){
			$result['status']='NOT';
			$result['msg']='Không có file nào được chọn !';
		}
		$file_lb = new FilePHP();
		$folder_name = IMG_TMP_PATH.$folder_tmp;
		if(is_dir($folder_name)==false){
			 @mkdir($folder_name, 0777, true);
		}
		foreach($filelist as $item){
			$name = $item['name'];
			if($item['size'] > 4000000) // >4MB
			{
				$result['status']='NOT';
				$result['msg']='File upload không được lớn 4MB !';
				break;
			}
			
			$file_tmp = $item['tmp_name'];			
			
			$file_name ='tmp/'.$folder_tmp.'/'.uniqid('',true).'.'.$file_lb->GetExtensionName($name);
			$file_lb->CopyFile($file_tmp,PHO_PUBLIC_PATH.$file_name);
			$file_lb->DeleteFile($file_tmp);
			$result['link'][] = BASE_URL_NAME.$file_name;
		}
		
		return $this->ViewJSON($result);
	}
}
