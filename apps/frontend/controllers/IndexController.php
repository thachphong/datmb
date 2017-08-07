<?php

namespace Multiple\Frontend\Controllers;

use Multiple\PHOClass\PHOController;
use Multiple\Models\Posts;
use Multiple\Models\News;
class IndexController extends PHOController
{

	public function indexAction()
	{
		$db = new Posts();
		$ne = new News();
		$param['newlist'] = $db->get_list_new();
		$param['viplist'] = $db->get_list_new(3);
		$param['kientruc'] = $ne->get_news_rows(67,6); // kiến trúc không gian
		$param['noingoaithat'] = $ne->get_news_rows(66,6); // noi ngoai that
		$param['phongthuy'] = $ne->get_news_rows(68,4); // phong thuy
		$param['tuvanluat'] = $ne->get_news_rows(69,4); // tu van luat
		$param['xemnhieu'] = $ne->get_news_pupular(5);
		$this->set_template_share();
		$this->ViewVAR($param);	
	}
	public function route404Action(){
		
	}
}
