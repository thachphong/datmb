<?php

namespace Multiple\Backend\Controllers;

use Multiple\PHOClass\PHOController;
use Multiple\Models\Page;
use Multiple\PHOClass\PhoLog;
class PageController extends PHOController
{

    public function initialize()
    {        
        $this->check_loginadmin();
    }
	public function indexAction()
	{
		$model = new Page();
		$rows['pages'] = $model->get_all();
		$this->set_template_share();
		$this->ViewVAR($rows);
	}
	
}
