<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('sendemail'));

        $this->load->model(array('MUser','MDeviceInfo','MMessage'));
        date_default_timezone_set('Asia/Tokyo');

    }

    public function sendCallmail(){
        $long  = $this->input->post(LONGITUDE);
        $lat = $this->input->post(LATITUDE);
        if ($this->is_post_method()) {
            $this->response_message($this->message('E001_ERROR'), 'E001');
        }
        if(empty($long)){
            $this->response_message($this->message('E011_ERROR'), 'E011');
        }
        if(empty($lat)){
            $this->response_message($this->message('E012_ERROR'), 'E012');
        }
        $params = $this->input->post();

        if($content = $this->MMessage->createMessage($params)){
            sendMail("title",$content);

        }else
        {
            $this->response_message();
        }

    }

}