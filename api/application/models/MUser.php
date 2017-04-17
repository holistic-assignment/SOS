<?php

Class MUser extends CI_Model
{

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
                ->select('email,username,password,token')
                ->or_where($params)
                ->get('users');
            while($query->num_rows()>0){
                return $query->row();
            }
        }
        return FALSE;
    }

    public function getAuth($params){
        return $this->db->where(array("token"=>$params['token']))->get('users')->row();
    }



    private function email_usernameSerialize($params,$name){
        if($name == "email_username") {
            return array(
                "username" => $params['email_username'],
                "email" => $params['email_username']
            );
        }else
        {
            return array(
                $name => $params[$name]
            );
        }
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
       return $this->db->select('token')->where("id",$id)->get("users")->row();

    }

    private function updateLocation(){
        
    }
    public function createUser1($params){
        $params = $this->serializeMember($params);
        $params['password'] = md5($params['password']);
        $this->db->set('token',password_hash(round(microtime(true) * 1000),PASSWORD_BCRYPT,array("cost"=>10)));
        $this->db->set('location',"Select ST_GeomFromText('POINT(-79.4609576808001 43.9726680183837)', 4326)");
        $this->db->insert('users', $params);
        var_dump($this->db->last_query());
        $id = $this->db->insert_id();
        return $this->getTokenById($id);
    }

}
