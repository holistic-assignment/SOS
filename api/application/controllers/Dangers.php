<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dangers extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('distance'));

    }

    public function listDangers(){
        $offset = is_numeric($this->input->post('offset')) ? intval($this->input->get('offset')) : 0;
        if($result = $this->MDanger->getlistDangers($offset)){
           $this->response_message($this->message('LIST_DANGER'), SUCCESS_CODE,1,"",$result);

        };
        $this->response_message();

    }
    //test

    public function allpointUser(){
        if ($this->is_post_method()) {
            $this->response_message($this->message('E001_ERROR'), 'E001');
        }
        $params = $this->input->post();
        if(!is_numeric($params[LATITUDE])){
            $this->response_message($this->message('E011_ERROR'), 'E011');
        }

        if(!is_numeric($params[LONGITUDE])){
            $this->response_message($this->message('E012_ERROR'), 'E012');
        }

        $result = $this->MDanger->getlistDangerCurrentDay();
        foreach ($result as $key=>$value){
            $result[$key]['userdistance'] = distanceLocation(
                doubleval($value[LATITUDE]), doubleval($value[LONGITUDE]),
                doubleval($params[LATITUDE]),doubleval( $params[LONGITUDE]));
            $result[$key]['userdistance']> doubleval($value['radius']) ?  $result[$key]['danger'] = 0 :  $result[$key]['danger'] = 1;

        }
        $this->response_message("result", SUCCESS_CODE,1,"",$result);

    }


    public function UpdateUserStatus(){
        if ($this->is_post_method()) {
            $this->response_message($this->message('E001_ERROR'), 'E001');
        }
        $params = $this->input->post();
        if(!is_numeric($params[LATITUDE])){
            $this->response_message($this->message('E011_ERROR'), 'E011');
        }

        if(!is_numeric($params[LONGITUDE])){
            $this->response_message($this->message('E012_ERROR'), 'E012');
        }

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
        $this->response_message("result", SUCCESS_CODE,1,"",$dangerpoints);

    }



}