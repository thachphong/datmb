<?php

namespace Multiple\Models;

use Multiple\Models\TagsPosts;
use Phalcon\Mvc\Model;
//use Phalcon\Mvc\Model\Query;

class Posts extends Model
{
    public  $post_id ;
    public  $post_no ;
    public  $post_name   ;
    public  $ctg_id  ;
    public  $m_type_id   ;
    public  $status  ;
    public  $m_provin_id ;
    public  $m_district_id   ;
    public  $m_ward_id   ;
    public  $price   ;
    public  $unit_price  ;
    public  $acreage ;
    public  $address ;
    public  $content ;
    public  $add_date    ;
    public  $add_user    ;
    public  $upd_date    ;
    public  $upd_user    ;
    public  $del_flg ;
    public  $toilet_num  ;
    public  $room_num    ;
    public  $floor_num   ;
    public  $street_width    ;
    public  $facade_width    ;
    public  $m_directional_id    ;
        
    public function initialize()
    {
        $this->setSource("posts");
    }
    
    public function get_by_id($id){
	 	return Posts::findFirst(array("post_id = :post_id:  ",'bind' => array('post_id' => $id) ));
	}
	public function _insert($param){
		//$this->post_id = $param[''];
	    $this->post_no = $param['post_no'];
	    $this->post_name   = $param['post_name'];
	    $this->ctg_id  = $param['ctg_id'];
	    $this->m_type_id   = $param['m_type_id'];
	    $this->status  = 0;
	    $this->m_provin_id = $param['m_provin_id'];
	    $this->m_district_id   = $param['m_district_id'];
	    $this->m_ward_id   = $param['m_ward_id'];
	    $this->price   = $param['price'];
	    $this->unit_price  = $param['unit_price'];
	    $this->acreage = $param['acreage'];
	    $this->acreage = $param['acreage'];
	    $this->content = $param['content'];
	   // $this->add_date    = $param[''];
	    $this->add_user    = $param['user_id'];
	    //$this->upd_date    = $param[''];
	    $this->upd_user    = $param['user_id'];
	    $this->del_flg = 0;
	    $this->toilet_num  = $param['toilet_num'];
	    $this->room_num    = $param['room_num'];
	    $this->floor_num   = $param['floor_num'];
	    $this->street_width    = $param['street_width'];
	    $this->facade_width    = $param['facade_width'];
	    $this->m_directional_id    = $param['m_directional_id'];
	    $this->save();
	    return $this->post_id;
	}
 //    public function get_new($limit = 6){       
 //        $data = Posts::query()
 //                ->where("status = 1")  
 //                ->order("add_date desc,add_time desc")
 //                ->limit($limit)
 //                ->execute();
 //        return $data;
 //    }
 //    public function get_by_menu($menu_id,$limit = 6,$offet=0){        
 //        $data = Posts::query()
 //                ->where("status = 1")  
 //                ->addwhere("menu_id in ( $menu_id )") 
 //               // ->bind(array("menu_id" => $menu_id)) 
 //                ->order("add_date desc,add_time desc")
 //                ->limit(array($limit,$offet))
 //               // ->offset(1)                 
 //                ->execute();
 //        return $data;
 //    }
 //    public function get_realtion_old($id,$type,$menu_id){        
 //        $data = Posts::query()
 //                ->where("menu_id = $menu_id ")
 //                ->addwhere("type = :type:")    
 //                ->addwhere("id < $id")  
 //                ->bind(array("type" => $type))
 //                ->order("add_date desc,add_time desc")
 //                ->limit(5)
 //                ->execute();
 //        return $data;
 //    }
 //    public function get_realtion_new($menu_id,$id){        
 //        $data = Posts::query()
 //                ->where("menu_id = $menu_id ")               
 //                ->addwhere("id <> $id") 
 //                ->order("add_date desc,add_time desc")
 //                ->limit(9)
 //                ->execute();
 //        return $data;
 //    }
 //    public function get_countpost($type='',$menu_id =''){
 //        $sql="select  count(*) cnt
	// 			from  posts 				
	// 			where (status <> 3)				
	// 			";
 //        if($type != ''){
 //            $sql.=" and posts.type = '".$type."'";
 //        }
 //        if($menu_id != ''){
 //            $sql.=" and posts.menu_id = ".$menu_id;
 //        }
 //        $result = static::getarray_by_sql($sql);
 //        if(count($result) > 0){
 //            return $result[0]['cnt'];
 //        }
 //        return 0;
 //    }
 //    public function get_totalrow($menu_id){
 //    	$pql = "SELECT count(*) cnt FROM Multiple\Models\Posts Posts
 //    			where status = 1 and menu_id in ( $menu_id )";
	// 	$total = $this->modelsManager->executeQuery($pql);		
	// 	return $total[0]->cnt;
	// }
 //    public function get_by_tag($tag_id,$limit = 6,$offet=0){    
 //    	$pql = "select p.* from Multiple\Models\TagsPosts t
	// 			INNER JOIN Multiple\Models\Posts p
	// 					on t.post_id = p.id and p.status =1
	// 			WHERE t.tag_id= :tag_id:
	// 			ORDER BY p.id DESC
	// 			limit $limit
	// 			OFFSET $offet";
	// 	$data = $this->modelsManager->executeQuery($pql,array( 'tag_id' => $tag_id));    
        
 //        return $data;
 //    }
 //    public function get_totalrow_bytag($tag_id){    
 //    	$pql = "select count(p.id) cnt from Multiple\Models\TagsPosts t
	// 			INNER JOIN Multiple\Models\Posts p
	// 					on t.post_id = p.id and p.status =1
	// 			WHERE t.tag_id= :tag_id:";
	// 			;
	// 	$data = $this->modelsManager->executeQuery($pql,array( 'tag_id' => $tag_id));    
        
 //        return $data[0]->cnt;
 //    }
 //    public function search($keysearch,$limit = 6,$offet=0){
 //    	$pql = "select *  from Multiple\Models\Posts
	// 			where  (REPLACE(caption_url,'-',' ') like :keysearch:  or 
	// 			caption like :keysearch:)
	// 			and status=1
	// 			ORDER BY add_date desc,add_time desc
	// 			limit $limit
	// 			OFFSET $offet";
	// 	$data = $this->modelsManager->executeQuery($pql,array( 'keysearch' => '%'.$keysearch.'%'));    
        
 //        return $data;
	// }
	// public function search_totalrow($keysearch){    
 //    	$pql = "select count(*) cnt  from Multiple\Models\Posts
	// 			where  (REPLACE(caption_url,'-',' ') like :keysearch:  or 
	// 			caption like :keysearch:)
	// 			and status=1 ";
	// 	$data = $this->modelsManager->executeQuery($pql,array( 'keysearch' => '%'.$keysearch.'%'));    
        
 //        return $data[0]->cnt;
 //    }
 //    public function be_get_posts($param){
	// 	$pql = "select *  from Multiple\Models\Posts
	// 			where  status=:status:
	// 			";
	// 	$sql_param['status']=$param['status'];
	// 	if(isset($param['add_date']) && strlen($param['add_date'])>0){
	// 		$sql_param['add_date']=$param['add_date'];
	// 		$pql .=" and add_date = :add_date: ";
	// 	}
	// 	if(isset($param['menu_id']) && strlen($param['menu_id'])>0){
	// 		$sql_param['menu_id']=$param['menu_id'];
	// 		$pql .=" and menu_id = :menu_id: ";
	// 	}
	// 	$pql .=" ORDER BY id DESC ";
	// 	if(isset($param['limit'])){
	// 		$pql .=" limit ".$param['limit'];
	// 	}
	// 	if(isset($param['offset'])){
	// 		$pql .=" OFFSET ".$param['offset'];
	// 	}
	// 	$data = $this->modelsManager->executeQuery($pql,$sql_param);    
        
 //        return $data;
	// }
	// public function be_count_posts($param){
	// 	$pql = "select count(*) cnt  from Multiple\Models\Posts
	// 			where  status=:status:
	// 			";
	// 	$sql_param['status']=$param['status'];
	// 	if(isset($param['add_date']) && strlen($param['add_date'])>0){
	// 		$sql_param['add_date']=$param['add_date'];
	// 		$pql .=" and add_date = :add_date: ";
	// 	}
	// 	if(isset($param['menu_id']) && strlen($param['menu_id'])>0){
	// 		$sql_param['menu_id']=$param['menu_id'];
	// 		$pql .=" and menu_id = :menu_id: ";
	// 	}		
	// 	$data = $this->modelsManager->executeQuery($pql,$sql_param);    
	// 	return $data[0]->cnt;
	// }
}
