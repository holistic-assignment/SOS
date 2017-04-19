<?php

Class MUser extends CI_Model
{
    private $_tbl_user = "users";

    public function __construct()
    {

        $this->load->database();

    }


    public function createUser($params){
        $params = $this->serializeMember($params);
        $params['password'] = md5($params['password']);
        $this->db->set('token',password_hash(round(microtime(true) * 1000),PASSWORD_BCRYPT,array("cost"=>10)));
        $this->db->insert('users', $params);
        $id = $this->db->insert_id();
        return $this->getTokenById($id);
    }



    public function checkUserExist($name,$params)
    {
        if(!empty($params[$name])) {
            $params = $this->email_usernameSerialize($params,$name);
            $query = $this->db
                ->select('id,email,name,password,token')
                ->or_where($params)
                ->get('users');
            while($query->num_rows()>0){
                return $query->row();
            }
        }
        return FALSE;
    }

    public function updateToken($id)
    {
        $token = password_hash(round(microtime(true)*1000),PASSWORD_BCRYPT,array("cost"=>10));
        $this->db->set('token', $token);
        $this->db->where('id', $id);
        $this->db->update('users');
        return $token;
   }

   public function getId($params){
       return intval($this->getAuth($params)->id);
   }


    public function getAuth($params){
        $token = $params['token'];
        $result =  $this->db->where(array("token"=>stripcslashes($token)))->get('users')->row();
        return $result;
    }

    public function getUserIdByToken($params){

    }

    public function update_token($id){


    }


    private function email_usernameSerialize($params,$name){

            return array(
                $name => $params[$name]
            );

    }

    private function serializeMember($params)
    {
        $result = array();
        $field_data = $this->db->field_data('users');
        unset($field_data[0]);
        foreach ($field_data as $value) {
            if (isset($params[$value->name])) {
                $result[$value->name] = $params[$value->name];
            }
        }

        return $result;
    }

    private function getTokenById($id){
       return $this->db->select('token,id')->where("id",$id)->get("users")->row();

    }

    private function updateLocation(){

    }


    //test
    public function update_location($params,$id){

        $this->db->set('location',"geomfromtext('POINT($params[lat] $params[lng])')", FALSE);
        $this->db->where('id',$id);
        $this->db->update('users');
        $id = $this->db->insert_id();
        //return $this->getTokenById($id);
        return $id;
    }


    public function getLocation(){

        $test = $this->db->where("id",11)->get("users")->row();
        return $test;
    }

}
