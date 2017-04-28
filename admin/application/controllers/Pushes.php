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


    public function create(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            parent::create();
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $params = $this->input->post();
            if (empty($params)) {

            }
            $users = $params['user_id'];
            unset($params['user_id']);
            $id = $this->MPush->create($params);
            $result = $this->MPush->createPush($id,$users);
            redirect("$this->controller/index");
        }

    }
}
