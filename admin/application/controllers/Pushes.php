<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pushes extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->helper(array('url'));



    }

    //---------------------------------------------------------------

    public function index()
    {
        parent::index();
    }

    public function send(){

        var_dump($_POST);
        $user_list = $_POST['myData'];
        $this->template->render();
    }
}
