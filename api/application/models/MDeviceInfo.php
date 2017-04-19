<?php
class MDeviceInfo extends CI_Model
{
    public function __construct()
    {

        $this->load->database();
    }

    public function updateDeviceInfo($params,$id){
        $params = $this->paramsDevice($params);
        $this->db->set('device_token', $params["device_token"]);
        $this->db->set('device_id', $params["device_id"]);
        $this->db->where('id', $id);
        $this->db->update('users');
    }

   private function paramsDevice($params){
       return array(
           "device_token" => $params['device_token'],
            "device_id" => $params['device_id']
       );
   }
}