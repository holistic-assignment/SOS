<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();


    }

    public function listNews(){
        $offset = is_numeric($this->input->post('offset')) ? intval($this->input->get('offset')) : 0;
        if($result = $this->MNew->getlistNews($offset)){
            $this->response_message($this->message('LIST_NEW'),SUCCESS_CODE,1,"",$result);

        };
        $this->response_message();

    }

}