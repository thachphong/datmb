<?php

namespace Multiple\Models;
use Multiple\Models\DBModel;

class Street extends DBModel
{
    public $m_street_id;
    public $m_street_name;
  	public $m_ward_id;

    public function initialize()
    {
        $this->setSource("m_street");
    }
    public function get_all(){
        return Street::find();
    }
}
