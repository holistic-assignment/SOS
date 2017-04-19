<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('MUser','MDeviceInfo'));
        $this->load->helper(array('email'));
    }


    public function login()
    {
        if ($this->is_post_method()) {
            $this->response_message($this->message('E001_ERROR'), 'E001');
        }
        $params = $this->input->post();
        $password = $this->input->post('password');
        $device_id = $this->input->post('device_id');
        $device_token = $this->input->post('device_token');
        if(empty($device_id)){
            $this->response_message($this->message('E009_ERROR'), 'E009');
        }

        if(empty($device_token)){
            $this->response_message($this->message('E010_ERROR'), 'E010');
        }

        if (empty($password)) {
            $this->response_message($this->message('E002_ERROR'), 'E002');
        }


        if ($current_user = $this->MUser->checkUserExist('email', $params)) {
            if ($current_user->password == md5($password)) {
                $token = $this->MUser->updateToken(intval($current_user->id));
                $this->MDeviceInfo->updateDeviceInfo($params,intval($current_user->id));
                $this->response_message("login successful", "200", 1, $token);
            } else {
                $this->response_message($this->message('E003_ERROR'), 'E003');
            }
        } else {
            $this->response_message($this->message('E004_ERROR'), 'E004');
        }

    }


    public function register()
    {
        if ($this->is_post_method()) {
            $this->response_message($this->message('E001_ERROR'), 'E001');
        }
        $params = $this->input->post();

        if(empty($params['device_id'])){
            $this->response_message($this->message('E009_ERROR'), 'E009');
        }

        if(empty($params['device_token'])){
            $this->response_message($this->message('E010_ERROR'), 'E010');
        }
        if(!is_numeric($params['os'])){
            $this->response_message($this->message('E015_ERROR'), 'E015');
        }
        if (!valid_email($params['email'])) {
            $this->response_message($this->message('E005_ERROR'), 'E005');
        }
        if (empty($params["password"])) {
            $this->response_message($this->message('E002_ERROR'), 'E002');
        }
        if (empty($params["name"])) {
            $this->response_message($this->message('E006_ERROR'), 'E006');
        }
        if ($this->MUser->checkUserExist('email', $params)) {
            $this->response_message($this->message('E008_ERROR'), 'E008');
        }
        if ($result = $this->MUser->createUser($params)) {

            $this->response_message("register successful", "200", 1, $result->token);
        } else {
            $this->response_message();
        }


    }

    public function test()
    {
        $params = $this->input->post();

    }




}
