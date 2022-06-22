<?php

class Group_model extends CI_Model
{

    public $tableName = "groups";

    public function __construct()
    {
        parent::__construct();

    }

    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }

    public function get_all($where = array(), $order = "created_time DESC")
    {
        return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
    }

    public function add($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }

    public function update($where = array(), $data = array())
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }

    public function delete($where = array(), $data = array("status" => 0))
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }
    
}
