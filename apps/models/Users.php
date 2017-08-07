<?php

namespace Multiple\Models;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;
use Multiple\Models\DBModel;

class Users extends DBModel
{    
    public $user_id;
    public $user_no;
    public $user_name;
    public $mobile;
    public $address;
    public $city;
    public $district;
    public $level;
    public $status;
    public $pass;
    public $add_date;
    public $upd_date;
    public $email;
    public $sex;

    //public $avata;
    public function initialize()
    {
        $this->setSource("user");
    }
    public function get_All(){
        $usr_data = Users::query()->execute();
        return $usr_data;
    }
    public function get_user($user_no,$pass){        
		return $user = Users::findFirst(array(
                "(email = :email: OR user_no = :email:) and pass= :pass:  AND status = 1 ",
                'bind' => array('email' => $user_no,'pass'=>$this->encodepass($pass))
        ));
	}
    private function encodepass($pass){
        return md5(PHO_SALT.$pass);
    }
	public function get_row($user_no,$pass){
        $sql="select * from user t
        where ( user_no = :email)  AND del_flg = 0 ";
                
        
		$data = $this->pho_query($sql,array('email' => $user_no));
		//return $data[0]['list_id'];
		
        if(count($data) > 0){
			return TRUE;
		}
		return FALSE;
    }
    public function _insert($param){
        $this->user_no =$param['user_no'];
        $this->user_name=$param['user_name'];
        $this->mobile=$param['mobile'];
        $this->address=$param['address'];
        $this->level=0; //user thường đăng ký
        $this->status = 0; // chưa kích hoạt
        $this->pass = $this->encodepass($param['pass']);
        $this->email =$param['email'];
        $this->sex =$param['sex'];
        return $this->save();
    }
    public function get_validation($param){
        $user = Users::findFirst(array(
                "(email = :email: OR user_no = :user_no:) and status <> 2 ",
                'bind' => array('email' => $param['email'],'user_no'=>$param['user_no'])
        ));
        if($user == false){
            return true;
        }
        if($user->email == $param['email']){
            return "Email này đã có, vui lòng nhập mail khác";
        }
        if($user->user_no == $param['user_no']){
            return "Tên đăng nhập này đã có, vui lòng nhập tên đăng nhập khác";
        }
    }
    // public function validation()
    // {
    //     $this->validate(new EmailValidator(array(
    //         'field' => 'email'
    //     )));
    //     $this->validate(new UniquenessValidator(array(
    //         'field' => 'email',
    //         'message' => 'Sorry, The email was registered by another user'
    //     )));
    //     $this->validate(new UniquenessValidator(array(
    //         'field' => 'user_no',
    //         'message' => 'Sorry, That username is already taken'
    //     )));
    //     if ($this->validationHasFailed() == true) {
    //         return false;
    //     }
    // }
}
