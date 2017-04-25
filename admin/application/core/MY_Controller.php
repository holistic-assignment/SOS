<?php
class MY_Controller extends CI_Controller
{
    protected $class;

    protected  $method;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set(TIME_ZONE);
        $this->load->helper(array('inflector','view'));
        $this->load->library('template');
        $this->class = ucwords($this->router->fetch_class());
        $method = strtolower($this->router->fetch_method());
        $this->load->model(array(singular("M".$this->class)));
        $this->loadPartialView();
    }

    public function index(){
        $where = $this->input->get();
        $modelname = singular("M".$this->class);
        $this->template->set('select_field', $this->{"$modelname"}->select_field);
        $this->template->set('data', $this->{"$modelname"}->get_all_data($where));
        $this->template->set_block('index','layouts/_index.php');
        $this->template->render();
    }

    public function search(){

    }

    public function update(){

    }


    private function loadPartialView(){
        $modelname = singular("M".$this->class);
        $this->template->set_block('header', 'layouts/_header.php');
        $this->template->set_block('leftpanel', 'layouts/_leftpanel.php');
        $this->template->set('search', $this->{"$modelname"}->field);
        $this->template->set_block('search','layouts/_search.php');

    }






}