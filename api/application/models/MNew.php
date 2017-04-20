<?php

Class MNew extends CI_Model
{
    private $_tbl_new = "news";

    public function __construct()
    {

        $this->load->database();
    }


    public function getlistNews($offset)
    {
        $this->db->select('title,content,url');
        $this->db->limit(LIMIT,$offset*LIMIT);
        $this->db->order_by('created_at' ,'DESC');
        return $this->db->get($this->_tbl_new)->result_array();
    }

}