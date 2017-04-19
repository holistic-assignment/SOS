<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebView extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('sendemail'));

        $this->load->model(array('MUser','MDeviceInfo','MMessage'));

    }

    public function supportCenter(){

        $this->load->view('webview/supportCenter');
    }

    public function Appinfo(){
        $this->load->view('webview/appInfo');
    }

}