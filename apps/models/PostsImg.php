<?php

namespace Multiple\Models;
use Multiple\Models\DBModel;

class PostsImg extends DBModel
{
    public $post_img_id;
    public $post_id;
  	public $img_path;
  	public $avata_flg;
  	
    public function initialize()
    {
        $this->setSource("posts_img");
    }
    public function get_all(){
         return PostsImg::find();
    }
}
