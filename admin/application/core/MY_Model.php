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
        $this->load->helper('query');
        $this->field = $this->get_field(1);
        $this->select_field = $this->get_select_field();
    }

    public function get_data($where=array()){
        $page=0;
        $page = isset($where['page']) ? $where['page']: $page;
        $where = $this->unset_page($where);
        $this->db->limit(LIMIT, LIMIT*$page);
        $this->query($where);
        $result = $this->db->get($this->table_name);
        if ($result->num_rows() > 0) {
            return ($result->result_array());
        } else {
            return false;
        }
    }

    public function total_record($where=array()){
        $where = $this->unset_page($where);
        $this->query($where);
        $total = $this->db->count_all_results($this->table_name);
        if ($total > 0) {
            return $total;
        } else {
            return 0;
        }
    }
    public function query($where)
    {

        $this->db->select(constant("SELECT_" . strtoupper(singular($this->table_name)) . "_FIELD"));
        $where = $this->unsetEmpty($where);
        $where_time = build_datetime_query($where , 0);
        $where = build_datetime_query($where,1);



        if (count($where)>0) {
            $this->db->like($where);
        }
        if(count($where_time) > 0 ){
            $this->db->where($where_time);
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


    public function get_select_field()
    {
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

    public function get_field($id)
    {
        $fields = $this->db->field_data($this->table_name);
        $data = array();
        if($id ==1 ) {
            $constant = constant("HIDE_" . strtoupper(singular($this->table_name)) . "_FIELD");
        }else
        {
            $constant = constant("SELECT_ALL_FIELD");
        }

        foreach ($fields as $field) {

            if (!in_array($field->name, $constant)) {
                if (in_array($field->name, SELECT_TAG_FIELD)) {
                    $data[$field->name] = SELECT_TAG;
                } else if (in_array($field->name, DATE_TIME_FIELD))
                {
                    $data[$field->name] = DATE_TAG;
                }
                else
                {
                    $data[$field->name] = $field->type;
                }
            }
        }
        return $data;
    }

    private function unsetEmpty($where)
    {
        foreach ($where as $key => $value) {
            if (empty($value)) {
                unset($where[$key]);
            };
        }
        return $where;
    }


    public function get($id) {
        return $this->db->get_where($this->table_name, array($this->primary_key => $id))->row();
    }

    public function edit_id($id){
        $data = $this->get_type();
        $obj_data = $this->get($id);
        $result = array();
        foreach($data as $key=>$type){
            $result[$key]['type'] = $type;
            $result[$key]['value'] = $obj_data->{"$key"};
        }
        return $result;
    }

    public function create($params= array()){
        if(count($params)>0)
        {
            $this->db->insert($this->table_name,$params);
        }
        return $this->get_type();
    }

    public function get_type(){
        return $this->get_field(0);

    }


    public function  update_id($param){
        $id = $param['id'];
        unset($param['id']);
        $this->db->where('id',$id);
        $this->db->update($this->table_name,$param);
        if($this->db->affected_rows()){
            print_r("update success");
            return true;
        }
        return false;

    }

    private function unset_page($where){
        if(isset($where['page'])){
            unset($where['page']);
        }
        return $where;
    }


}