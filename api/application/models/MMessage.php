<?php
Class MMessage extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function createMessage($params){
        $id = $this->MUser->getId($params);
        $this->MUser->update_location($params,$id);
        $params = array_merge($params ,$this->content($params,$id));
        $params = $this->serializeMember($params);
        $params['user_id'] = $id;

        $this->db->insert("messages",$params);
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
            $type = 2;
            $content .="User message: $params[message]";
        }
        return array("type"=> $type,
                        "content"=>$content);

    }

    private function serializeMember($params)
    {
        $result = array();
        $field_data = $this->db->field_data('messages');
        unset($field_data[0]);
        foreach ($field_data as $value) {
            if (isset($params[$value->name])) {
                $result[$value->name] = $params[$value->name];
            }
        }

        return $result;
    }


}