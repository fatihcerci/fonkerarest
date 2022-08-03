<?php

class User_model extends CI_Model
{

    public $tableName = "users";

    public function __construct()
    {
        parent::__construct();

    }

    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }

    public function get_all($searchKey = "", $where=array(), $order = "created_time DESC")
    {
        $this->db->select('*');
        $this->db->from($this->tableName);
        if(!empty($searchKey)) {
            $this->db->group_start();
            $this->db->like('country', $searchKey);
            $this->db->or_like('identity_number', $searchKey);
            $this->db->or_like('name', $searchKey);
            $this->db->or_like('surname', $searchKey);
            $this->db->or_like('title', $searchKey);
            $this->db->or_like('email', $searchKey);
            $this->db->or_like('phone', $searchKey);
            $this->db->group_end();
        }
        $this->db->where($where);
        $this->db->order_by($order);
        $query = $this->db->get();

        return $query->result();
        //return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
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

