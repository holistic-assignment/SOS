<?php
class MY_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set(TIME_ZONE);
        $this->load->database();
    }

    protected function update_datetime(){

        $this->db->set('updated_at',Date('Y-m-d H:i:s'));
    }


    protected function insert_datetime(){
        $this->db->set('created_at',Date('Y-m-d H:i:s'));
        $this->db->set('updated_at',Date('Y-m-d H:i:s'));
    }

}