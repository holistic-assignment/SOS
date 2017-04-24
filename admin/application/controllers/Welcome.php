<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->helper(array('url'));
    }

    //---------------------------------------------------------------

    function index()
    {
        $this->template->set_block('header', 'layouts/_header.php');
        $this->template->set_block('leftpanel', 'layouts/_leftpanel.php');

        $this->template->render();
    }
}
