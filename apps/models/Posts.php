<?php

namespace Multiple\Models;

use Multiple\Models\TagsPosts;
use Multiple\Models\DBModel;
use Multiple\PHOClass\PHOArray;
//use Phalcon\Mvc\Model\Query;

class Posts extends DBModel
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
	public function get_info($id){
		$sql="select p.post_id,p.post_name,p.post_no, v.post_level,DATEDIFF(v.end_date, v.start_date) post_date_num 
				from posts p
				INNER JOIN posts_view v on v.post_id = p.post_id
				where p.post_id = :post_id";
		return $this->query_first($sql,array('post_id'=>$id));
	}
	public function get_post_row($id){
		$sql = "select p.post_id,p.post_name,p.post_no,
				  p.ctg_id,
				  p.m_type_id,
				  p.status,
				  p.m_provin_id,
				  p.m_district_id,
				  p.m_ward_id,
				  p.price,
				  p.unit_price,
				  p.acreage,
				  p.address,
				  p.content,  
				  p.del_flg,
				  p.toilet_num,
				  p.room_num,
				  p.floor_num,
				  p.street_width,
				  p.facade_width,
				  p.m_directional_id,
				 v.post_level,				
				 DATE_FORMAT(v.end_date ,'%d/%m/%Y')  end_date,
				 DATE_FORMAT(v.start_date ,'%d/%m/%Y')  start_date,	
				 V.post_view_id,
				c.post_contract_id,		
				c.full_name,
				c.address contract_address,
				c.phone,
				c.mobie,
				c.email
				from posts p
				INNER JOIN posts_view v on v.post_id = p.post_id
				INNER JOIN posts_contract c on c.post_id = p.post_id
				where p.post_id = :post_id";
		return $this->query_first($sql,array('post_id'=>$id));
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
	   // $this->acreage = $param['acreage'];
	    $this->content = $param['content'];
	    $this->address    = $param['address'];
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
	public function _update($param){
		$sql = "update posts
					set post_name = :post_name,
					ctg_id = :ctg_id,
					post_no = :post_no,
					m_provin_id = :m_provin_id,
					m_district_id = :m_district_id,
					price = :price,
					acreage = :acreage,
					content = :content,
					upd_user = :user_id,
					toilet_num = :toilet_num,
					room_num = :room_num,
					floor_num = :floor_num,
					street_width = :street_width,
					facade_width = :facade_width,
					m_directional_id = :m_directional_id,
					address =:address,
					m_type_id =:m_type_id,
					upd_date =now()

				where post_id =:post_id
				";
		$this->pho_execute($sql, PHOArray::filter($param, array(
                    'post_id'
                    ,'post_name' 
                    ,'ctg_id'                               
                    ,'post_no'
                    ,'user_id'
                    ,'m_provin_id'
                    ,'m_type_id'
                    ,'m_district_id'
                    ,'price'
                    ,'acreage'
                    ,'content'
                    ,'toilet_num'
                    ,'room_num'
                    ,'floor_num'
                    ,'street_width'
                    ,'m_directional_id'
                    ,'address'
                    ,'facade_width'
                    )));  
        return TRUE;
	}
	public function get_list_new($post_type= '',$limit = 10){
		$where ="";
		if($post_type !=''){
			$where =" and v.post_level = $post_type";
		}
		$sql ="select p.post_id,p.post_name,p.post_no,p.price,p.acreage,pro.m_provin_name,dis.m_district_name,
				un.m_unit_name ,im.img_path,
				DATE_FORMAT(v.start_date ,'%d/%m/%Y')  start_date
				from posts p
				INNER JOIN m_provincial pro on pro.m_provin_id = p.m_provin_id
				INNER JOIN m_district dis on dis.m_district_id = p.m_district_id
				INNER JOIN posts_view v on v.post_id = p.post_id
				LEFT JOIN posts_img im on im.post_id = p.post_id and im.avata_flg = 1
				LEFT JOIN m_unit un on un.m_unit_id = p.unit_price 

				where p.del_flg = 0
				$where
				order by p.post_id DESC
				limit 10";
		return $this->pho_query($sql);
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
