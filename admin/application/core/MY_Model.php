<?php

class MY_Model extends CI_Model
{

    protected $table_name = '';
    protected $primary_key = 'id';
    public $field;
    public $select_field;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set(TIME_ZONE);
        if (!$this->table_name) {
            $this->table_name = substr(strtolower(plural(get_class($this))), 1);
        }

        $this->load->database();

        $this->field = $this->get_field();
        $this->select_field = $this->get_select_field();
        $this->get_all_data();

    }

    public function get_all_data($where = array())
    {
        $this->db->select(constant("SELECT_" . strtoupper(singular($this->table_name)) . "_FIELD"));
        $where = $this->unsetEmpty($where);
        if(count($where)){
            $this->db->like($where);
        }
        $result = $this->db->get($this->table_name);
        if ($result->num_rows() > 0) {
            return ($result->result_array());
        } else {
            return false;
        }
    }

    protected function update_datetime()
    {

        $this->db->set('updated_at', Date('Y-m-d H:i:s'));
    }


    protected function insert_datetime()
    {
        $this->db->set('created_at', Date('Y-m-d H:i:s'));
        $this->db->set('updated_at', Date('Y-m-d H:i:s'));
    }


    public function get_select_field(){
        $fields = $this->db->field_data($this->table_name);
        $data = array();
        $constant = constant("SELECT_" . strtoupper(singular($this->table_name)) . "_FIELD");
        foreach ($fields as $field) {

            if (in_array($field->name, $constant)) {
                $data[$field->name] = $field->type;
            }
        }
        return $data;
    }

    public function get_field()
    {
        $fields = $this->db->field_data($this->table_name);
        $data = array();
        foreach ($fields as $field) {
            $constant = constant("HIDE_" . strtoupper(singular($this->table_name)) . "_FIELD");
            if (!in_array($field->name, $constant)) {
                $data[$field->name] = $field->type;
            }
        }
        return $data;
    }

    private function unsetEmpty($where){
        foreach ($where as $key=>$value){
            if(empty($value)){
                unset($where[$key]);
            };
        }
        return $where;
    }

}