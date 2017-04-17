<?php

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->lang->load('common_error', 'japanese');
        $this->load->model(array('MUser'));
        $this->auth();
    }


    protected function is_post_method()
    {
        return empty($this->input->post());

    }

    private function auth()
    {
        if ($this->skip_auth()) {
            return;
        }
        $params = $this->input->post();

        $where['token'] = isset($params['token']) ? $params["token"] : "";
        if (!$this->MUser->getAuth($where)) {
            $this->response_message(null, null, array("message" => "Un-Authenticate"));
        };
    }

    private function skip_auth()
    {
        $skipclass = array("users");
        $skipmethod = array("login", 'register');
        $class = strtolower($this->router->fetch_class());
        $method = strtolower($this->router->fetch_method());
        if (in_array($class, $skipclass)) {
            if (in_array($method, $skipmethod)) {
                return TRUE;
            }
        }
        return FALSE;
    }

    protected function response_message($message = "Unknown Error", $code = 0, $custom = array())
    {
        if (empty($custom)) {
            $response['status'] = "Failed";
            $response['code'] = $code;
            $response['message'] = $message;
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
        echo json_encode($custom);
        exit;
    }
}