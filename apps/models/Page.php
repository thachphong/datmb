<?php

namespace Multiple\Models;

use Multiple\Models\DBModel;
//use Phalcon\Mvc\Model\Query;

class Page extends DBModel
{
    public $id;
    public $title;
    public $status;
    public $parent;
    public $no;
    public $sort;
    public function initialize()
    {
        $this->setSource("page");
    }
    public function get_page_list(){
        $sql="select page_id,page_no,page_name from page where del_flg= 0";
        return $this->pho_query($sql);
    }
}
