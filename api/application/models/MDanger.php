<?php

Class MDanger extends CI_Model
{
    private $_tbl_danger = "dangers";

    public function __construct()
    {

        $this->load->database();
    }


    public function getlistDangers($offset)
    {
        $this->db->select('title,content,url');
        $this->db->limit(LIMIT,$offset*LIMIT);
        $this->db->order_by('created_at' ,'DESC');
        return $this->db->get($this->_tbl_danger)->result_array();
    }


    public function getlistDangerCurrentDay(){
        $this->db->select('lat,lng,radius,created_at');
        $this->db->order_by('created_at','DESC');
        $this->db->where('DATE(created_at)',date('Y-m-d'));
        return $this->db->get($this->_tbl_danger)->result_array();
    }

}