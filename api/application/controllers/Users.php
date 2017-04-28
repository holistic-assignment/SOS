<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('email','distance','request'));
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
                $this->response_message(LOGIN_SUCCESS, SUCCESS_CODE, 1, $token);
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
        if (empty($params["name"])) {
            $this->response_message($this->message('E006_ERROR'), 'E006');
        }
        if (!valid_email($params['email'])) {
            $this->response_message($this->message('E005_ERROR'), 'E005');
        }
        if ($this->MUser->checkUserExist('email', $params)) {
            $this->response_message($this->message('E008_ERROR'), 'E008');
        }
        if (empty($params["password"])) {
            $this->response_message($this->message('E002_ERROR'), 'E002');
        }
        if(!is_numeric($params['os'])){
            $this->response_message($this->message('E015_ERROR'), 'E015');
        }
        if ($result = $this->MUser->createUser($params)) {

            $this->response_message(REGISTER_SUCCESS, SUCCESS_CODE, 1, $result->token);
        } else {
            $this->response_message();
        }


    }



    public function UpdateUserStatus(){

        if ($this->is_post_method()) {
            $this->response_message($this->message('E001_ERROR'), 'E001');
        }
        $params = $this->input->post();
        $long  = $params[LONGITUDE];
        $lat =  $params[LATITUDE];
        $battery = $params[BATTERY];

        if(!is_numeric($long)){
            $this->response_message($this->message('E011_ERROR'), 'E011');
        }
        if(!is_numeric($lat)){
            $this->response_message($this->message('E012_ERROR'), 'E012');
        }
        if(!is_numeric($battery)){
            $this->response_message($this->message('E016_ERROR'), 'E016');
        }
        if($this->MUser->update_location($params) && $this->MUser->update_baterystatus($params)){

//            $str = "curl -XPOST -H 'Content-Type: application/x-www-form-urlencoded' -d 'token=%242y%2410%24pLs6aPNY1UL%2FSLc5s4eXqeNXVVh8.emWxImGuowRykahf3lY7oxbW&lat=10.77281690274683&lng=106.6812111739703&battery=50' 'http://localhost/api/index.php/users/checkDanger'";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,API_CHECK_DANGER);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, getHeaders());
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
            $result = curl_exec($ch);
            if ($result === false) {
                throw new Exception(curl_error($ch));
            }

//            curl_close($ch);
            $this->response_message(REGISTER_SUCCESS, SUCCESS_CODE, 1);
            //$this->output = $result;

        }

    }

    public function checkDanger(){
        echo base_url();
        $params = $this->input->post();
        $result = $this->MDanger->getlistDangerCurrentDay();
        $dangerpoints = array();
        foreach ($result as $key=>$value){
            $distance = distanceLocation(
                doubleval($value[LATITUDE]), doubleval($value[LONGITUDE]),
                doubleval($params[LATITUDE]),doubleval( $params[LONGITUDE]));
            if($distance < doubleval($value[RADIUS])) {
                $dangerpoints[] = $value;
            }

        }
        if (count($dangerpoints) > 0 ){
            $this->push();
        };
    }

    public function test()
    {
        $params = $this->input->post();

    }

    private function push(){
        if (PUSH_ENVIRONMENT == 'ALL' || PUSH_ENVIRONMENT == 'PRODUCTION') {
            $env = 0;
            $this->send_push_ios("test test", $env);
        }
        // push development
        if (PUSH_ENVIRONMENT == 'ALL' || PUSH_ENVIRONMENT == 'DEVELOPMENT') {
            $env = 1;
            $this->send_push_ios("test test", $env);
        }

    }

    public function send_push_ios($text,$env){
        require_once 'application/libraries/ApnsPHP/Autoload.php';
        $params = $this->input->post();
        $user = $this->MUser->getAuth($params);

        if($env == 0){
            $env = ApnsPHP_Abstract::ENVIRONMENT_PRODUCTION;
            $cer = DIS_PEM_FILE;
        } else {
            $env = ApnsPHP_Abstract::ENVIRONMENT_SANDBOX;
            $cer = DEV_PEM_FILE;
        }
        try {
            $socket = new ApnsPHP_Push($env, $cer);
            $socket->connect();
            if (!$socket) {
                die("Push socket unavailable for user os ios and environment " . $env ? 'PRODUCTION' : 'SANDBOX');
            }

                // Instantiate a new Message with a single recipient
            $message = new ApnsPHP_Message($user->device_token);

            // Set a custom identifier. To get back this identifier use the getCustomIdentifier() method
            // over a ApnsPHP_Message object retrieved with the getErrors() message.
            //$message->setCustomIdentifier(sprintf("Message-Badge-%03d", $i));

            $message->setText($text);
            //$message->setCustomProperty('type','1');
            $message->setCustomProperty('dateUpdate',array("test"));
            //$message->setCustomProperty('content',"asdasdasdasdasdas");
            // Set badge icon to "1"
            $message->setBadge(10);


            // Add the message to the message queue
            $socket->add($message);

            $socket->send();
            $socket->disconnect();

        } catch (PDOException $exception) {
            //return log::database($exception, 'Cannot set push history');
            echo 'Cannot set push history';
        }

    }




}
