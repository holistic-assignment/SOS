<?php

Class MNew extends CI_Model
{
    private $_tbl_new = "news";

    public function __construct()
    {

        parent::__construct();
    }


    public function getlistNews($last_id)
    {
        $this->db->select('id,title,content,url');
        $this->db->limit(LIMIT);

        if(!empty($last_id)){
            $this->db->where('id <', $last_id);
        }
        $this->db->order_by('created_at,id' ,'DESC');
        return $this->db->get($this->_tbl_new)->result_array();
    }

}