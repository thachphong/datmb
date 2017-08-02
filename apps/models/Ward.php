<?php

namespace Multiple\Models;
use Multiple\Models\DBModel;

class Ward extends DBModel
{
    public $m_ward_id;
    public $m_ward_name;
  	public $m_district_id;

    public function initialize()
    {
        $this->setSource("m_ward");
    }
    public function get_all(){
        return Ward::find();
    }
}
