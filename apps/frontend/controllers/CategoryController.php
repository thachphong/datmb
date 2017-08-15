<?php

namespace Multiple\Frontend\Controllers;
use Multiple\PHOClass\PHOController;
//use Phalcon\Mvc\Controller;
use Multiple\Models\Posts;
use Multiple\Models\Category;
use Multiple\Models\News;
use Multiple\PHOClass\PhoLog;
//use Phalcon\Cache\Backend\File as BackFile;
//use Phalcon\Cache\Frontend\Data as FrontData;
class CategoryController extends PHOController
{

	public function indexAction($ctg_no)
	{      
        $page=1;
      	$param = $this->get_Gparam(array('page'));   
        if(isset($param['page']) && strlen($param['page']) > 0){
            $page=$param['page'];
        }
        $db = new Posts();
        $ctg = new Category();
        $start_row = 0;
        if( $page > 1){
            $start_row = ( $page-1)*PAGE_LIMIT_RECORD ;
        }

        $param['page'] = $page;
        $param['ctg_name'] ='Tin rao mới';
        $param['ctg_no'] ='tin-moi';
        if($ctg_no != 'allnew'){
            $info = $ctg->get_ctg_byno($ctg_no);
            $param['ctg_name'] = $info->ctg_name;
            $param['ctg_no'] ='c/'. $ctg_no;
        }        
        $param['post']=$db->get_post_byctgno($ctg_no,$start_row);
        $param['total_post'] = $db->get_post_byctgno_count($ctg_no);
        $param['total_page']= round($param['total_post']/PAGE_LIMIT_RECORD);
        
        $start = $page - 2;
        $end = $page + 2;
        if($page < 3){
            $start = 1;
            $end = $start + 4;
            if($end > $param['total_page']){
               $end = $param['total_page'];
            }
        }
        if($param['total_page']< $page + 2 ){
            $end = $param['total_page'];
            $start = $param['total_page'] - 4;
            if($start < 1){
               $start = 1;
            }
        }
        $param['start'] = $start;
        $param['end'] = $end;
       
        $this->set_template_share();
        $this->ViewVAR($param);
	}
	public function newslistAction($ctg_no)
	{
      
      	$page=1;
        $param = $this->get_Gparam(array('page'));   
        if(isset($param['page']) && strlen($param['page']) > 0){
            $page=$param['page'];
        }
        $cache = $this->createCache(['lifetime' => 600 ]); //10 phut
        $cachekey = $ctg_no."_p".$page;
        $param = $cache->get($cachekey);
        if($param == null){
            $db = new News();
            $ctg = new Category();
            $start_row = 0;
            if( $page > 1){
                $start_row = ( $page-1)*PAGE_NEWS_LIMIT_RECORD ;
            }

            $param['page'] = $page;
            $info = $ctg->get_ctg_byno($ctg_no);
            $param['ctg_name'] = $info->ctg_name;
            $param['news']=$db->get_news_byctgno($ctg_no,$start_row);
            $param['total_post'] = $db->get_news_byctgno_count($ctg_no);
            $param['total_page']= round($param['total_post']/PAGE_NEWS_LIMIT_RECORD);
            $param['ctg_no'] = $ctg_no;
            $start = $page - 2;
            $end = $page + 2;
            if($page < 3){
                $start = 1;
                $end = $start + 4;
                if($end > $param['total_page']){
                   $end = $param['total_page'];
                }
            }
            if($param['total_page']< $page + 2 ){
                $end = $param['total_page'];
                $start = $param['total_page'] - 4;
                if($start < 1){
                   $start = 1;
                }
            }
            $param['start'] = $start;
            $param['end'] = $end;
            $cache->save($cachekey,$param);
        }
        //PhoLog::debug_var('---abc--',$param);
        $this->set_template_share();
        $this->ViewVAR($param);
	}	
	public function searchAction($keyword,$page=1)
	{
      
      	$db = new Posts();
      	
        $request = $_REQUEST;
        $rowtop = 6;
       // $page = 1;
        $total = 10 ;
        $totalpage = 1;
        
        
        $from = ($page-1)*$total;
        $to = $page*$total;
               
        
        $totalrow = $db->search_totalrow($keyword);
        $totalpage = ceil(($totalrow) /$total);
        
        //$datatop = $db->get_by_tag($tag->tag_id,$rowtop,0);
        $datadetail = $db->search($keyword,$total,$from );
        $this->view->title = $keyword;
        $this->view->page_no = $keyword;
        $this->view->menu_id = 1;
        $this->view->datatop= NULL;
        $this->view->datadetail= $datadetail;
        $this->view->page = $page;
        $this->view->totalpage= $totalpage;
	}
}
