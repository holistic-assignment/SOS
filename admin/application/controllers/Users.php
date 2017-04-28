<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url'));



    }

    //---------------------------------------------------------------

//    public function index()
//    {
//        parent::index();
//    }

    /*public function show(){
        parent::show();
    }*/
}
