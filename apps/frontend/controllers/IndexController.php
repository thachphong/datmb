<?php

namespace Multiple\Frontend\Controllers;

use Multiple\PHOClass\PHOController;
use Multiple\Models\Posts;

class IndexController extends PHOController
{

	public function indexAction()
	{
		$db = new Posts();
		$param['newlist'] = $db->get_list_new();
		$param['viplist'] = $db->get_list_new(3);
		$this->set_template_share();
		$this->ViewVAR($param);	
	}
	public function route404Action(){
		
	}
}
