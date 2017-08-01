<?php

namespace Multiple\Frontend\Controllers;

use Multiple\PHOClass\PHOController;
use Multiple\Models\Posts;

class IndexController extends PHOController
{

	public function indexAction()
	{
		$this->set_template_share();
		//$this->ViewVAR($param);	
	}
	public function route404Action(){
		
	}
}
