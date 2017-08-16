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
class VPostController extends PHOController
{
	public function initialize()
    {        
        //$this->check_login();
    }
	public function indexAction($url)
	{
		$exp  = explode('_', $url)	;	
		$id = $exp[count($exp)-1];
		$db = new Posts();
		$result = $db->get_vpost($id);
		$img = new PostsImg();
		$result['imglist'] = $img->get_img_bypost($id);
		$this->set_template_share();
		$this->ViewVAR($result);	
	}
	public function viewAction($id)
	{
		//$url =  $this->request->getURI();
        //$abc =1;
       // $post_data= Posts::findFirst
        $this->set_template_share();
		//$this->ViewVAR($result);
	}
	
	
	
}
