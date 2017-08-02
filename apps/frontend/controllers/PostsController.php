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
class PostsController extends PHOController
{

	public function indexAction($id)
	{
		
		//$ip = $this->get_client_ip_server();
		//$db_v =new  CheckView();
		$result['provincials'] = Provincial::get_all();
		$result['districts'] = District::find();
		$result['wards'] = Ward::find();
		$result['streets'] = Street::find();
		$result['directionals'] = Directional::find();
		$result['units'] = Unit::find();
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
}
