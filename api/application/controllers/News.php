<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();


    }

    public function listNews(){
        $last_id = is_numeric($this->input->post('id')) ? intval($this->input->post('id')) : "";
        if($result = $this->MNew->getlistNews($last_id)){
            $this->response_message(EMPTY_MESSAGE,SUCCESS_CODE,1,"",$result);

        };
        $this->response_message();

    }

}