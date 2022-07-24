<?php

class Base_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function add($tableName, $data = array())
    {
        $this->db->insert($tableName, $data);
        $insert_id = $this->db->insert_id();
        
        return  $insert_id;
    }
    
    public function list($tableName, $where = array(), $order = "created_time ASC")
    {
        return $this->db->where($where)->order_by($order)->get($tableName)->result();
    }
    
    public function get($tableName, $where = array())
    {
        return $this->db->where($where)->get($tableName)->row();
    }
    
    public function delete($tableName, $where = array())
    {
        return $this->db->where($where)->delete($tableName);
    }
    
    public function update($tableName, $where = array(), $data = array())
    {
        return $this->db->where($where)->update($tableName, $data);
    }
}
