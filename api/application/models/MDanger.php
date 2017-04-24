<?php

Class MDanger extends MY_Model
{
    private $_tbl_danger = "dangers";

    public function __construct()
    {
        parent::__construct();
    }


    public function getlistDangers($last_id)
    {
        $this->db->select('id,title,content,url');
        $this->db->limit(LIMIT);

        if(!empty($last_id)){
            $this->db->where('id <', $last_id);
        }
        $this->db->order_by('created_at,id' ,'DESC');
        return $this->db->get($this->_tbl_danger)->result_array();
    }


    public function getlistDangerCurrentDay(){
        $this->db->select('id,lat,lng,radius,created_at');
        $this->db->order_by('created_at','DESC');
        $this->db->where('DATE(created_at)',"2017-04-20");
        return $this->db->get($this->_tbl_danger)->result_array();
    }

}