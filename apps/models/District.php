<?php

namespace Multiple\Models;
use Multiple\Models\DBModel;

class District extends DBModel
{
    public $m_district_id;
    public $m_district_name;
  	public $m_provin_id;
    public function initialize()
    {
        $this->setSource("m_district");
    }
    public function get_all(){
         return District::find();
    }
}
