<?php

namespace Multiple\Backend\Controllers;

use Multiple\PHOClass\PHOController;
use Multiple\Models\Slide;
class SlideController extends PHOController
{

    public function initialize()
    {        
        $this->check_loginadmin();
    }
	public function indexAction()
	{
		$slide_db = new Slide();
		$data['list'] = $slide_db->get_all();
		$this->set_template_share();
		$this->ViewVAR($data);
	}
	public function editAction()
	{
		$param = $this->get_param(array('slide_id'));
		$slide_db = new Slide();
		if(strlen($param['slide_id'])==0){  // new
			$result['data'] = $slide_db;
		}else{//edit
			$result['data'] = $slide_db->get_row($param['slide_id']);
		}
		//$data['list'] = $slide_db->get_all();
		//$this->set_template_share();
		$this->ViewHtml('slide/edit',$result);
	}
	public function editslideAction()
	{
		$param = $this->get_param(array('slide_id'));
		$slide_db = new Slide();
		if(strlen($param['slide_id'])==0){  // new
			$result['data'] = $slide_db;
		}else{//edit
			$result['data'] = $slide_db->get_row($param['slide_id']);
		}
		//$data['list'] = $slide_db->get_all();
		//$this->set_template_share();
		$this->ViewHtml($result);
	}
}
