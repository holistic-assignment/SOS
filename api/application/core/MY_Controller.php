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
        $checkPost =  $this->input->post();
        return empty($checkPost);
    }
    private function auth()
    {
        if ($this->skip_auth()) {
            return;
        }
        $params = $this->input->post();

        $where['token'] = isset($params['token']) ? $params["token"] : "";
        if (!$this->MUser->getAuth($where)) {
            $this->response_message($this->lang->line('E000_ERROR'),'E000');
        };
    }

    private function skip_auth()
    {
        $skipclass = array("users","webview");
        $skipmethod = array("login", 'register','supportcenter','appinfo');
        $class = strtolower($this->router->fetch_class());
        $method = strtolower($this->router->fetch_method());
        if (in_array($class, $skipclass)) {

            if (in_array($method, $skipmethod)) {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function response_message($message = "Unknown Error", $code = 0, $flag=0,$token="",$data = array())
    {
        if ($flag == 0) {
            $response['status'] = "Failed";
            $response['code'] = $code;
            $response['message'] = $message;
            $response['data'] = $data;
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }else {
            $response['status'] = 'OK';
            $response['code'] = $code;
            $response['message'] = $message;
            $response['token']= $token;
            $response['data']= $data;
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }

    public function message($message)
    {
        return $this->lang->line($message);
    }
}