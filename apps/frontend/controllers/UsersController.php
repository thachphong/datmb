<?php

namespace Multiple\Frontend\Controllers;

use Multiple\PHOClass\PHOController;
use Multiple\Models\Users;
use Multiple\Models\Define;
use Multiple\Library\Mail;
class UsersController extends PHOController
{

	public function indexAction()
	{
		echo '<br>', __METHOD__;
	}
	public function registerAction(){
		$this->set_template_share();
	}
	public function loginAction(){
		$this->set_template_share();
	}
	public function updateAction(){
		$param = $this->get_param(array('user_no','user_name','email','mobile','address','pass','sex'));
		$result = array('status' => 'OK');
		$result['status'] = 'OK';	
		$result['msg'] = 'Cập nhật thành công!';		
		$db = new Users();
	
		$msg = $db->get_validation($param);
		$add_date = "";
		if($msg === true){
			$db->_insert($param);
			$this->sendmail($db);
		}else{
			$result['status'] = 'NOT';	
			$result['msg'] = $msg;
		}
		return $this->ViewJSON($result);
	}
	public function sendmail($usr){
		$email = new Mail();
		
		$body_tmp = $this->get_body($usr);		
		$replacements['HEADER'] = '<h3><strong>Chúc mừng bạn đã đăng kí thành công tài khoản trên Datxanhviet.vn!</strong></h3>';
		$replacements['BODY'] = $body_tmp;
		$db = new Define();
		$data = $db->get_info(DEFINE_KEY_EMAIL);
		//$mail_to[]['mail_address']= $data->define_val;
		$mail_to[]['mail_address']= $usr->email;	
		//ACWLog::debug_var('--mail',$mail_to);	
		//ACWLog::debug_var('--mail',$data);
		$email->AddListAddress($mail_to);
		$email->add_replyto($data->define_val,'datxanhviet.vn');
                
		$email->Subject = 'Thông tin đặt hàng - '.date('d/m/Y H:i:s');                
		$email->loadbody('template_mail.html');
		$email->replaceBody($replacements);
		$result = $email->send();
	}
	public function get_body($usr){
		$url = BASE_URL_NAME."users/active?email=".$usr->email."&rd=".$usr->user_id;
		$html="<p>Dưới đây là thông tin đăng nhập của bạn: </p>
			   <p><strong>Tên đăng nhập:</strong> ".$usr->user_no."</p>
			   <p><strong>Email:</strong> ".$usr->email."</p>
			   <p><strong>Điện thoại:</strong> ".$usr->mobile." </p>
			   <br/>
			   <p>Vui lòng kích vào đường link dưới đây để kích hoạt tài khoản của bạn:</p>
			  <a href='".$url ."'>".$url ."</a> 

			<p>Nếu đường link trên không hoạt động, vui lòng copy đường link đó, rồi paste lên thanh địa chỉ của trình duyệt để link tới trang kích hoạt trên hệ thống. </p>
			<p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</p>";
		return $html;
	}
}
