<?php

namespace Multiple\Frontend\Controllers;

use Multiple\PHOClass\PHOController;
use Multiple\Models\Posts;
use Multiple\Models\News;
//use Phalcon\Cache\Backend\File as BackFile;
//use Phalcon\Cache\Frontend\Data as FrontData;
class IndexController extends PHOController
{

	public function indexAction()
	{
		$options = ['lifetime' => 900 ]; // thoi gian tinh bang giay 
		$cache = $this->createCache($options);
 		//$frontendCache = new FrontData($options); 	
 		///$cache = new BackFile( $frontendCache,  ['cacheDir' => PHO_CACHE_DIR ]);	
 		$cacheKey = '67_66_68_69';
 		$ne = new News();
 		//$param  = $this->dataCache->get($cacheKey);
 		$param = $cache->get($cacheKey);
 		if($param === null){
 			$param['kientruc'] = $ne->get_news_rows(67,6); // kiến trúc không gian
			$param['noingoaithat'] = $ne->get_news_rows(66,6); // noi ngoai that
			$param['phongthuy'] = $ne->get_news_rows(68,4); // phong thuy
			$param['tuvanluat'] = $ne->get_news_rows(69,4); // tu van luat
			$cache->save($cacheKey, $param);
			//$frontendCache->save( $param);
 		}		

		$db = new Posts();		
		$param['newlist'] = $db->get_list_new();
		//$param['viplist'] = $db->get_list_new(3);
		//$param['xemnhieu'] = $ne->get_news_pupular(5);
		$this->set_template_share();
		$this->ViewVAR($param);	
	}
	public function route404Action(){
		
	}
}
