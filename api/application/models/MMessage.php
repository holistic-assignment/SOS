<?php
Class MMessage extends MY_Model
{
    private $_tbl_message = "messages";
    public function __construct()
    {
        parent::__construct();
    }

    public function createMessage($params){

        $id = $this->MUser->getId($params);
        $this->MUser->update_location($params);
        $params = array_merge($params ,$this->content($params,$id));
        $params = $this->serializeMember($params);

        $params['user_id'] = $id;
        $this->insert_datetime();
        $this->db->insert($this->_tbl_message,$params);
        if($this->db->affected_rows() ==1) {
            return $params['content'];
        }
    }


    private function content($params,$id)
    {

        $type =1; //call message
        $content = "GSMAT : $id \n"
                  ."Message : your user at longitude: $params[lat] and lattitude: $params[lng] \n";
        if(!empty($params['message'])){
            $type = 0;
            $content .="User message: $params[message]";
        }
        return array("message_type"=> $type,
                        "content"=>$content);

    }

    private function serializeMember($params)
    {
        $result = array();
        $field_data = $this->db->field_data($this->_tbl_message);
        unset($field_data[0]);
        foreach ($field_data as $value) {
            if (isset($params[$value->name])) {
                $result[$value->name] = $params[$value->name];
            }
        }

        return $result;
    }


}