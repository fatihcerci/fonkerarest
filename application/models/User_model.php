<?php

class User_model extends CI_Model
{

    public $tableName = "users";

    public function __construct()
    {
        parent::__construct();

    }
    
    public function get_users($where = array(), $order = "id ASC")
    {
        return $this->db->where($where)->order_by($order)->get($this->tableName);
    }

    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }

    /** Tüm Kayıtları bana getirecek olan metot.. */
    public function get_all($where = array(), $order = "id ASC")
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
    public function get_all_users($where = array(), $order = "full_name ASC")
    {
        return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
    }
    
    public function is_session_finished($user_id)
    {
        $sql = "SELECT
                    id,
                    full_name,
                    last_activity_time,
                    CASE WHEN last_activity_time IS NULL OR MOD( TIMESTAMPDIFF(minute,last_activity_time, CURRENT_TIMESTAMP()), 60) > 999999999 THEN true ELSE false END AS sessionFinished
                FROM
                    users
                WHERE id = ?";
        $query = $this->db->query($sql, array($user_id));
        return $query->row();
    }
    
    public function update_session($user_id)
    {
        return $this->db->where(array("id" => $user_id))->update($this->tableName, array("last_activity_time" => date("Y-m-d H:i:s"), "is_online" => 1));
    }
    
    public function remove_session($user_id)
    {
        return $this->db->where(array("id" => $user_id))->update($this->tableName, array("last_activity_time" => NULL, "is_online" => 0));
    }
    
    public function get_session_time($user_id)
    {
        $sql = "select 
                    MOD( TIMESTAMPDIFF(minute,CURRENT_TIMESTAMP(), (last_activity_time + INTERVAL 10 MINUTE)), 60) as minute,
                    MOD(TIMESTAMPDIFF(SECOND, CURRENT_TIMESTAMP(), (last_activity_time + INTERVAL 10 MINUTE)), 60) as second,
                    TIMESTAMPDIFF(SECOND, CURRENT_TIMESTAMP(), (last_activity_time + INTERVAL 10 MINUTE)) as onlySecond
                from users
                where id = ?";
        $query = $this->db->query($sql, array($user_id));
        return $query->row();
    }
    
    public function get_user_evaluations_count($user_id)
    {
        $sql = "select count(score) as count_score, avg(score) as avg_score from client_evaluations where user_id = ? and status = 1";
        
        $query = $this->db->query($sql, array($user_id));
        return $query->row();
    }
    
    public function get_user_evaluations($user_id)
    {
        $sql = "select c.full_name, a.score, a.comment, a.created_time from client_evaluations a
                inner join users c on a.client_id = c.id
                where a.user_id = ? and a.status = 1";
        
        $query = $this->db->query($sql, array($user_id));
        return $query->result();
    }
    
}
