<?php
class MY_Controller extends CI_Controller
{
    protected $class;

    protected  $method;

    protected $controller;

    protected $params;

    protected $action;
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set(TIME_ZONE);
        $this->load->helper(array('inflector','view','url'));
        $this->load->library('template');
        $this->class = ucwords($this->router->fetch_class());
        $method = strtolower($this->router->fetch_method());

        $this->load->model(array(singular("M".$this->class)));
        $this->controller = $this->router->fetch_class();
        $this->action = $this->router->fetch_method();
        $this->template->set('controller', $this->controller);
        $this->template->set('action', $this->action);
        $this->loadPartialView();
    }

    public function index(){
        $where = $this->input->get();

        $modelname = singular("M".$this->class);
        $this->template->set('select_field', $this->{"$modelname"}->select_field);
        $this->template->set('data', $this->{"$modelname"}->get_data($where));
        $this->template->set('count', $this->{"$modelname"}->total_record($where));
        $this->template->set_block('index','layouts/_index.php');
        $this->template->render();
    }

    public function show()
    {
        $id = $this->input->get('id');

        if (!empty($id)) {
            $modelname = singular("M" . $this->class);
            $this->template->set('obj', $this->{"$modelname"}->get($id));
            $this->template->set('id', $id);
            $this->template->set_block('show', 'layouts/_show.php');
            $this->template->render();
        }

    }

    public function edit(){
        $id = $this->input->get('id');

        if (!empty($id)) {
            $modelname = singular("M" . $this->class);

            $this->template->set('obj', $this->{"$modelname"}->edit_id($id));

            $this->template->set('id', $id);
            $this->template->set_block('edit', 'layouts/_edit.php');
            $this->template->render();
        }
    }

    public function create(){
        $modelname = singular("M" . $this->class);
        if($_SERVER['REQUEST_METHOD'] == 'GET') {

            $this->template->set('obj', $this->{"$modelname"}->create());
            $this->template->set_block('create', 'layouts/_create.php');
            $this->template->render();
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(empty($this->params)) {
                $this->params = $this->input->post();
            }
            $this->{"$modelname"}->create($this->params);
            redirect("$this->controller/index");
        }
    }


    public function search(){

    }

    public function update(){
        $modelname = singular("M" . $this->class);
        $param=$this->input->post();
        $this->{"$modelname"}->update_id($param);
        redirect("$this->controller/index");
    }


    private function loadPartialView(){
        $modelname = singular("M".$this->class);
        $this->template->set_block('header', 'layouts/_header.php');
        $this->template->set_block('leftpanel', 'layouts/_leftpanel.php');
        $this->template->set('search', $this->{"$modelname"}->field);
        $this->template->set_block('search','layouts/_search.php');

    }






}