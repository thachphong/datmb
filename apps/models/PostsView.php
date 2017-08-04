<?php

namespace Multiple\Models;
use Multiple\Models\DBModel;

class PostView extends DBModel
{
    public $post_view_id;
    public $post_id;
    public $start_date;
    public $post_level;
    public $add_datetime;
    public $upd_datetime;
    public $add_user_id;
    public $upd_user_id;
  
    public function initialize()
    {
        $this->setSource("posts_view");
    }
    public function get_all(){
         return PostView::find();
    }
}
