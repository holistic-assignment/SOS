<?php

Class MUser extends MY_Model
{
    private $_tbl_user = "users";
    const HIDE_FIELD = array('id', 'password','token','device_id','del_flag','created_at','updated_at','device_token');
    public function test1(){
        $fields = $this->db->field_data($this->_tbl_user);
        $data = array();
        foreach ($fields as $field)
        {
            if(!in_array($field->name, self::HIDE_FIELD)) {
                $data[$field->name] = $field->type;
            }
        }
        return $data;
    }




}