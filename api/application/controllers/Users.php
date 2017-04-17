<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('MUser'));

        $this->load->helper(array('email'));

    }


    public function login()
    {
        if ($this->is_post_method()) {
            $this->response_message($this->message('E001_ERROR'), 'E001');
        }
        $params = $this->input->post();
        $password = $this->input->post('password');

        if (empty($this->input->post('password'))) {
            $this->response_message($this->message('E002_ERROR'), 'E002');
        }
        if ($current_user = $this->MUser->checkUserExist('email_username', $params)) {
            if ($current_user->password == md5($password)) {
                $this->response_message(null, null, array("status" => "OK", "token" => $current_user->token));
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

        if (!valid_email($params['email'])) {
            $this->response_message($this->message('E005_ERROR'), 'E005');
        }
        if (empty($params["password"])) {
            $this->response_message($this->message('E002_ERROR'), 'E002');
        }
        if (empty($params["username"])) {
            $this->response_message($this->message('E006_ERROR'), 'E006');
        }
        if ($this->MUser->checkUserExist('username', $params)) {
            $this->response_message($this->message('E007_ERROR'), 'E007');
        }
        if ($this->MUser->checkUserExist('email', $params)) {
            $this->response_message($this->message('E008_ERROR'), 'E008');
        }
        if ($result = $this->MUser->createUser($params)) {
            $this->response_message(null, null, array("status" => "OK", "token" => $result->token));
        } else {
            $this->response_message();
        }


    }

    public function test()
    {
        $params = $this->input->post();
        $result = $this->MUser->createUser1($params);
    }


    private function message($message)
    {
        return $this->lang->line($message);
    }

}
