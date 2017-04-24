<?php

Class MUser extends MY_Model
{
    private $_tbl_user = "users";

    public function __construct()
    {

        parent::__construct();

    }


    public function createUser($params){
        $params = $this->serializeMember($params);
        $params['password'] = md5($params['password']);
        $this->db->set(TOKEN,password_hash(round(microtime(true) * 1000),PASSWORD_BCRYPT,array(COST=>10)));
        $this->insert_datetime();
        $this->db->insert($this->_tbl_user, $params);
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
                ->get($this->_tbl_user);
            while($query->num_rows()>0){
                return $query->row();
            }
        }
        return FALSE;
    }

    public function updateToken($id)
    {
        $token = password_hash(round(microtime(true)*1000),PASSWORD_BCRYPT,array(COST=>10));
        $this->db->set(TOKEN, $token);
        $this->db->where('id', $id);
        $this->update_datetime();
        $this->db->update($this->_tbl_user);
        return $token;
   }

   public function getId($params){
       return intval($this->getAuth($params)->id);
   }


    public function getAuth($params){
        $token = $params[TOKEN];
        $result =  $this->db->where(array(TOKEN=>stripcslashes($token)))->get($this->_tbl_user)->row();
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
        $field_data = $this->db->field_data($this->_tbl_user);
        unset($field_data[0]);
        foreach ($field_data as $value) {
            if (isset($params[$value->name])) {
                $result[$value->name] = $params[$value->name];
            }
        }

        return $result;
    }

    private function getTokenById($id){
       return $this->db->select('token,id')->where(ID,$id)->get($this->_tbl_user)->row();

    }

    //test
    public function update_location($params){
        $id = $this->getId($params);
        $this->db->trans_start();
        $this->db->set(LATITUDE,$params[LATITUDE]);
        $this->db->set(LONGITUDE,$params[LONGITUDE]);
        $this->db->where(ID,$id);
        $this->update_datetime();
        $this->db->update($this->_tbl_user);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        }
        return $id;
    }

    public function update_baterystatus($params){
        $id = $this->getId($params);
        $this->db->trans_start();
        $this->db->set(BATTERY,$params[BATTERY]);
        $this->db->where(ID,$id);
        $this->update_datetime();
        $this->db->update($this->_tbl_user);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        }
        return $id;

    }


    public function getLocation(){

        $test = $this->db->where(ID,11)->get($this->_tbl_user)->row();
        return $test;
    }

}
