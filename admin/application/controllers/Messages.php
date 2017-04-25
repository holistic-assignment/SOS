<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends MY_Controller {

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
}
