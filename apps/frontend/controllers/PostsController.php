<?php

namespace Multiple\Frontend\Controllers;

use Multiple\PHOClass\PHOController;
use Multiple\Models\Posts;
use Multiple\Models\PostsView;
use Multiple\Models\PostsImg;
use Multiple\Models\PostsContract;

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
	public function initialize()
    {        
        $this->check_login();
    }
	public function indexAction($id)
	{
				
		if(strlen($id) == 0 || $id == 0){
			$result['start_date'] = date('d/m/Y');
			$result['end_date'] = date('d/m/Y',strtotime('+ 14 day'));
			$result['post_name']='';
			$result['post_no']='';
			$result['post_id']='';
			$result['ctg_id']='';
			$result['m_type_id']=1;
			$result['status']='';
			$result['m_provin_id']='';
			  $result['m_district_id']='';
			  $result['m_ward_id']='';
			  $result['price']='';
			  $result['unit_price']='';
			  $result['acreage']='';
			  $result['address']='';
			  $result['content']='';  
			  $result['del_flg']='';
			  $result['toilet_num']='';
			  $result['room_num']='';
			  $result['floor_num']='';
			  $result['street_width']='';
			  $result['facade_width']='';
			  $result['m_directional_id']='';
			$result['post_level']='3';	// tin sieu vip	
			$result['full_name']='';
			$result['contract_address']='';
			$result['phone']='';
			$result['mobie']='';
			$result['email']='';
			$result['img_list']=array();
			$result['post_view_id']='';
			$result['post_contract_id']='';
			$result['map_lat'] ='';
			$result['map_lng'] = '';
		}else{
			$db = new Posts();
			$dbimg = new PostsImg();
			$result = $db->get_post_row($id);
			$result['img_list']= $dbimg->get_img_bypost($id);
		}
		$result['categorys'] = Category::get_all();
		$result['provincials'] = Provincial::get_all();
		$result['districts'] = District::find();
		$result['wards'] = Ward::find();
		$result['streets'] = Street::find();
		$result['directionals'] = Directional::find();
		$result['units'] = Unit::find();
		$result['folder_tmp'] = uniqid("",true);
		//PhoLog::debug_var('---info----','id:'.$id);
		//PhoLog::debug_var('---info----',$result);
		$this->set_template_share();
		$this->ViewVAR($result);	
	}
	public function updateAction(){
		$param = $_POST;
		//PhoLog::debug_var('test----',$param);
		$result = array('status' => 'OK');
		$result['status'] = 'OK';	
		$result['msg'] = 'Cập nhật thành công!';		
		$db = new Posts();
		$pview = new PostsView();		
		$pcon = new PostsContract();
		$msg = $this->check_validate_update($param);
		$add_date = "";
		if($msg == ""){
			$file = new FilePHP();
			$login_info =  $this->session->get('auth');
        	$param['user_id'] = $login_info->user_id;
       // 	$listfile = $this->get_listfile($param['content']);
        	$paview   =  $param['view'];
        	$paview['user_id'] = $param['user_id'];
        	$contract =  $param['contract'];
        	$edit_flg = false;
			if(strlen($param['post_id'])==0){
				PhoLog::debug_var('update----','inset');
				$id = $db->_insert($param);
				$param['post_id'] = $id;	
				$paview['post_id'] = $id;	
				$contract['post_id'] = $id;
				$add_date = $db->add_date;
				$pview->_insert($paview);	
				$pcon->_insert($contract);
				
				$result['msg'] = $id;
			}else{
				$edit_flg = true;
				$db->_update($param);
				//PhoLog::debug_var('update----','1');
				$paview['post_id'] = $param['post_id'];
				$paview['post_view_id'] = $param['post_view_id'];
				$contract['post_id'] = $param['post_id'];
				$contract['post_contract_id'] = $param['post_contract_id'];
				$pview->_update($paview);
				//PhoLog::debug_var('update----','2');				
				$pcon->_update($contract);
				//PhoLog::debug_var('update----','3');

				$po = $db->get_by_id($param['post_id']);
				$add_date = $po->add_date;
				if(isset($param['img_del']) &&  count($param['img_del']) > 0){
					$pimg = new PostsImg();
					foreach ($param['img_del'] as $key => $img){
						$pimg->delete_bypost($param['post_id'],$img);
						$file->DeleteFile(PHO_PUBLIC_PATH.$img);
					}
				}		
				$result['msg'] = $param['post_id'];
			}
			if(isset($param['img_add']) && count($param['img_add']) > 0){
				$imglist = $this->move_file($add_date,$param['post_id'],$param['img_add']);			
				$paimg['post_id'] = $param['post_id'];
				foreach ($imglist as $key => $img) {
					$pimg = new PostsImg();
					$paimg['img_path'] = $img;
					$paimg['avata_flg'] = 0;
					if($key == 0){
						$paimg['avata_flg'] = 1;
					}				
					$pimg->_insert($paimg);
				}
			}
			if($edit_flg){
				$pimg = new PostsImg();
				$pimg->reset_avata($param['post_id']);
			}

			$file->DeleteFolder(PHO_PUBLIC_PATH.'tmp/'.$param['folder_tmp']);
			
		}else{
			$result['status'] = 'ER';	
			$result['msg'] = $msg;
		}
		return $this->ViewJSON($result);
	}
	public function move_file($add_date,$post_id,$listfile){
		$dest_folder = PHO_PUBLIC_PATH.'images/posts';
		//$src_folder= PHO_PUBLIC_PATH.'tmp/'.$folder_tmp;
		$result = array();
		$file = new FilePHP();
		$date = date_create($add_date);
		$year = date_format($date, 'Y');
		$month = date_format($date, 'm');
		$day = date_format($date, 'd');
		$dest_folder .= "/".$year;
		if($file->FolderExists($dest_folder) == false){
			$file->CreateFolder($dest_folder);
		}
		$dest_folder .= "/".$month;
		if($file->FolderExists($dest_folder) == false){
			$file->CreateFolder($dest_folder);
		}
		$dest_folder .= "/".$day;
		if($file->FolderExists($dest_folder) == false){
			$file->CreateFolder($dest_folder);
		}
		$dest_folder .= "/".$post_id;
		if($file->FolderExists($dest_folder) == false){
			$file->CreateFolder($dest_folder);
		}
		//PhoLog::debug_Var('---rrrr--',$listfile);
		foreach ($listfile as $key => $value){
			$exp = explode('/', $value);
			$desti_file = 'images/posts/'.$year.'/'.$month.'/'.$day.'/'.$post_id.'/'.$exp[count($exp)-1];
			$src_file = str_replace(BASE_URL_NAME, '', $value);
			$file->CopyFile(PHO_PUBLIC_PATH.$src_file,PHO_PUBLIC_PATH.$desti_file);
			//PhoLog::debug_Var('---rrrr--','from:'.PHO_PUBLIC_PATH.$src_file);	
			//PhoLog::debug_Var('---rrrr--','to:'.PHO_PUBLIC_PATH.$desti_file);	
			$file->DeleteFile(PHO_PUBLIC_PATH.$value);
			$result[] = $desti_file;			
		}
		return $result;
	}
	public function get_img_main_path($add_date,$post_id)
	{
		$date = date_create($add_date);
		$year = date_format($date, 'Y');
		$month = date_format($date, 'm');
		$day = date_format($date, 'd');
		$path = 'images/news/'.$year.'/'.$month.'/'.$day.'/'.$post_id;
		return $path;
	}
	public function check_validate_update(&$param){
		$param['post_no'] = $this->convert_url($param['post_name']);
		$param['address_ascii'] = $this->convert_ascii($param['address']);		
		return "";
	}
	
	public function successAction($post_id){
		$db = new Posts();
		$po = $db->get_info($post_id);
		//$po['post_date_num'] =\DateTime::createFromFormat('d/m/Y', '09/08/2017')->format("m/d/Y"); //date_create('09/08/2017','d/m/Y');
		$result['post'] = $po;
		$this->set_template_share();
		$this->ViewVAR($result);	
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
			if($item['size'] > 4096000) // >4MB
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
	public function listAction(){
		$db = new Posts();
		$user = $this->session->get('auth');
		$result['list']=$db->get_list_byuser($user->user_id);
		$this->set_template_share();
		$this->ViewVAR($result);	
	}
	public function deleteAction($id){
		$db = new Posts();
		$db->_delete($id);
		$this->_redirect('tin-da-dang');
	}
	
}
