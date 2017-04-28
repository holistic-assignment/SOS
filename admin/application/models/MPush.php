<?php

Class MPush extends MY_Model
{

    public function createPush($push_id,$users_id){
        if(empty($push_id)){
            return false;
        }

        if(count($users_id)<0){
            return false;
        }
        $result = array();
        foreach ($users_id as $value){
            $result[] = array(	'user_id' => $value,
                                'push_id' => $push_id);

        }
        $this->db->insert_batch('user_push',$result);
        return ($this->db->affected_rows() > 0) ? false : true;
    }

}