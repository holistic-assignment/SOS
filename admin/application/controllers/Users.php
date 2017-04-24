<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->helper(array('url'));
        $this->load->model(array('MUser'));

        $this->template->set_block('header', 'layouts/_header.php');
        $this->template->set_block('leftpanel', 'layouts/_leftpanel.php');
    }

    //---------------------------------------------------------------

    public function index()
    {
     $result = $this->MUser->test1();
        var_dump($result);

        $this->template->set('search', $result);
        $this->template->render();
    }
}
