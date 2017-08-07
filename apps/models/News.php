<?php

namespace Multiple\Models;

use Multiple\Models\DBModel;
use Multiple\PHOClass\PHOArray;

class News extends DBModel
{
    public $news_id;
    public $news_name;
    public $ctg_id;
    public $news_no;
    public $content;
    public $des;
    public $img_path;
    public $add_date;
    public $add_user;
    public $upd_date;
    public $upd_user;
    public $del_flg;
 

    public function initialize()
    {
        $this->setSource("news");
    }
    public function get_news_all(){
        $sql="select n.news_id,
                  n.news_no,
                  n.news_name,               
                  n.content,                 
                  n.des,
                  n.img_path,
                  n.add_date,
                  n.add_user,
                  n.upd_date,
                  n.upd_user,                 
                  n.del_flg,
                    c.ctg_name
              from news n
                left JOIN category c on c.ctg_id = n.ctg_id    ";
        return $this->pho_query($sql);
    }
    public function get_news_info($news_id){
        $sql=" select n.news_id,
                  n.news_no,
                  n.news_name,               
                  n.content,                 
                  n.des,
                  n.img_path,
                  n.add_date,
                  n.add_user,
                  n.upd_date,
                  n.upd_user,                 
                  n.del_flg,
                  n.ctg_id,
                    c.ctg_name
              from news n
                left JOIN category c on c.ctg_id = n.ctg_id
               where n.news_id = :news_id";
        $res = $this->pho_query($sql ,array('news_id'=>$news_id));
        if(count($res)> 0){
            return $res[0];
        }
        return null;
    }
  public function _insert($param){
    $this->news_name = $param['news_name'];
    $this->news_no= $param['news_no'];
    $this->content= $param['content'];
    $this->ctg_id= $param['ctg_id'];
    $this->des= $param['des'];
    $this->img_path= $param['img_path'];
    //$this->add_date= $param['news_name'];
    $this->add_user= $param['user_id'];
    //$this->upd_date= $param['news_name'];
    $this->upd_user= $param['user_id'];
    $this->del_flg=  $param['del_flg'];
    $this->save();
    return $this->news_id;
  }
  public function _update($param){

    //$login_info = ACWSession::get('user_info');
    //$param['user_id'] = $login_info['user_id'];   
    $sql = "update news
          set news_no = :news_no,
            news_name = :news_name,
            ctg_id = :ctg_id,
            des = :des,
            img_path = :img_path ,
            content = :content,          
            upd_date = now(),
            upd_user = :user_id,           
            del_flg = :del_flg
          where news_id = :news_id
        ";
    
    $sql_par = PHOArray::filter($param, array(
          'news_id',
          'news_no',
            'news_name',
            'content',
            'ctg_id',
            'des',
            'img_path',             
            'user_id',           
            'del_flg'           
          ));
    return $this->pho_execute($sql,$sql_par );     
  }
  public function get_news($news_id){
    return  News::findFirst(array(
                "news_id = :news_id: ",
                'bind' => array('news_id' => $news_id)
    ));
  }
  public function get_news_byno($news_no){        
    return  News::findFirst(array(
                "news_no = :news_no: ",
                'bind' => array('news_no' => $news_no)
    ));
  }    
  public function get_news_exist($news_no,$news_id){        
        return  News::findFirst(array(
                "news_no = :news_no: and news_id <> :news_id:",
                'bind' => array('news_no' => $news_no,'news_id'=>$news_id)
        ));
  }
  public function get_news_rows($ctg_id,$limit=10){
        $sql="select n.news_id,
                  n.news_no,
                  n.news_name,
                  n.des,
                  n.img_path,
                  n.add_date
              from news n              
              where n.ctg_id= :ctg_id 
              order by n.news_id desc
              limit $limit";
        return $this->pho_query($sql,array('ctg_id'=>$ctg_id));
  }
  public function get_news_pupular($limit=10){
        $sql="select n.news_id,
                  n.news_no,
                  n.news_name,
                  n.des,
                  n.img_path,
                  n.add_date
              from news n 
              order by n.news_id desc
              limit $limit";
        return $this->pho_query($sql);
  }
}
