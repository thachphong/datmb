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
    public  $map_lat;
    public  $map_lng;
        
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
				  p.map_lat,
				  p.map_lng,
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
	    $this->map_lat = $param['map_lat'];
	    $this->map_lng = $param['map_lng'];
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
					m_ward_id = :m_ward_id,
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
					map_lat = :map_lat ,
					map_lng = :map_lng,
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
                    ,'m_ward_id'
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
                    ,'map_lat'
                    ,'map_lng'
                    )));  
        return TRUE;
	}
	public function get_list_new($post_type= '',$limit = 10){
		$where ="";
		if($post_type !=''){
			$where =" and v.post_level = $post_type";
		}
		$sql ="select p.post_id,p.post_name,p.post_no,p.price,p.acreage,pro.m_provin_name,dis.m_district_name,
				NULLIF(un.m_unit_name,'') m_unit_name,
				NULLIF(im.img_path,'') img_path,
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
	public function get_post_byctgno($ctg_no,$start_row=0){
		$limit = PAGE_LIMIT_RECORD;
		$where ="";
		$param = array();
		if($ctg_no != 'allnew'){
			$where =" and p.ctg_id in (
					select ctg_id from category 
					where del_flg =0
					and ctg_no = :ctg_no
					union all
					select ctg_id from category 
					where parent_id =(select ctg_id from category where del_flg =0  and ctg_no = :ctg_no)
					)	";
			$param['ctg_no'] = $ctg_no;
		}
		$sql="select p.post_id,p.post_name,p.post_no,p.price,p.acreage,pro.m_provin_name,dis.m_district_name,
				NULLIF(un.m_unit_name,'') m_unit_name,
				NULLIF(im.img_path,'') img_path,
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
				limit $limit
				OFFSET $start_row
				";
		return $this->pho_query($sql,$param);
	}
	public function get_post_byctgno_count($ctg_no){	
		$where ="";
		$param = array();
		if($ctg_no != 'allnew'){
			$where =" and p.ctg_id in (
					select ctg_id from category 
					where del_flg =0
					and ctg_no = :ctg_no
					union all
					select ctg_id from category 
					where parent_id =(select ctg_id from category where del_flg =0  and ctg_no = :ctg_no)
					)	";
			$param['ctg_no'] = $ctg_no;
		}	
		$sql="select count(p.post_id) cnt
				from posts p				
				where p.del_flg = 0
				$where
				";
		$res = $this->query_first($sql,$param);
		return $res['cnt'];
	}
	public function get_vpost($post_id){
		$sql="select p.post_id,p.post_name,p.post_no,
				  ctg.ctg_name,
					ctg.ctg_id,
					ctg.ctg_no,
				  p.m_type_id,
				  p.status,
				  mp.m_provin_name,
				  md.m_district_name,
				  mw.m_ward_name,
				  p.price,
				  mu.m_unit_name,
				  p.acreage,
				  p.address,
				  p.content,  
				  p.del_flg,
				  p.toilet_num,
				  p.room_num,
				  p.floor_num,
				  p.street_width,
				  p.facade_width,
				  p.map_lat,
				  p.map_lng,
				  di.m_directional_name,
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
				INNER JOIN category ctg on ctg.ctg_id = p.ctg_id
				INNER JOIN posts_view v on v.post_id = p.post_id
				INNER JOIN posts_contract c on c.post_id = p.post_id
				INNER JOIN m_provincial mp on mp.m_provin_id = p.m_provin_id
				INNER JOIN m_district md on md.m_district_id = p.m_district_id
				LEFT JOIN m_ward mw on mw.m_ward_id = p.m_ward_id
				LEFT JOIN m_unit mu on mu.m_unit_id = p.unit_price
				LEFT JOIN m_directional di on di.m_directional_id = p.m_directional_id 			
				
				where p.post_id = :post_id 
				and p.del_flg = 0";
		return $this->query_first($sql,array('post_id'=>$post_id));
	}
}
