<?php

namespace Multiple\Models;
use Multiple\Models\DBModel;

class Define extends DBModel
{
    public $define_id;
    public $define_key;
    public $define_name;
    public $define_val;
    public $upd_date;
    public $upd_user;
  	public $sort;
  	public $group_flg;
    public function initialize()
    {
        $this->setSource("define");
    }
    public function get_all(){
         return Define::find();
    }
    public function get_info($define_key){        
		return Define::findFirst(array(
                "define_key = :define_key: ",
                'bind' => array('define_key' => $define_key)
        ));
	}
}
