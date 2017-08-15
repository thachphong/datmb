<?php

namespace Multiple\Frontend\Controllers;

use Multiple\PHOClass\PHOController;
use Multiple\Models\Posts;
use Multiple\Models\News;
use Multiple\Models\Provincial;
use Multiple\Models\District;
use Multiple\Models\Ward;
use Multiple\Models\Street;
use Multiple\Models\Directional;
use Multiple\Models\Unit;
use Multiple\Models\Category;

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
			
			//$frontendCache->save( $param);
			$cache2 = $this->createCache( ['lifetime' => 900 ]); // 1 ngay
			$cacheKey2 = 'seachtopparam1.cache';
			$search_pa = $cache2->get($cacheKey2);
			if($search_pa === null){			
				$search_pa['categorys'] = Category::get_all();
				$search_pa['provincials'] = Provincial::get_all();
				$search_pa['directionals'] = Directional::find();
				$search_pa['units'] = Unit::find();			
				$cache->save($cacheKey2, $search_pa);
			}
			$param = array_merge($param, $search_pa);

			$cache->save($cacheKey, $param);
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
	public function districtAction($m_provin_id){
		$db = new Provincial();
		$data['list'] = $db->get_byparent($m_provin_id);
		return $this->ViewJSON($data);
	}
	public function wardAction($m_district_id){
		$db = new Provincial();
		$data['list'] =$db->get_byparent($m_district_id);
		return $this->ViewJSON($data);
	}
	public function streetAction($m_district_id){
		
	}
}
