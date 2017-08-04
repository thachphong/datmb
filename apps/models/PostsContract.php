<?php

namespace Multiple\Models;
use Multiple\Models\DBModel;

class PostView extends DBModel
{
    public $post_contract_id;
    public $post_id;
    public $full_name;
    public $address;
    public $phone;
    public $mobie;
    public $email;  
  
    public function initialize()
    {
        $this->setSource("posts_contract");
    }
    public function get_all(){
         return PostView::find();
    }
}
