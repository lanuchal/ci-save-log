<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_node extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    
    public function get_node()
    {
        $this->db->select('node_id,node_ip,node_name,node_detail,node_status,create_time,update_time');
        $this->db->from('serv_node');
        $this->db->where('deleted', '0');
        $result = $this->db->get();
        return $result->result_array();
    }


    public function get_node_id($id)
    {
        $this->db->select('node_id,node_ip,node_name,node_detail,node_status');
        $this->db->from('serv_node');
        $this->db->where('node_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function update_node_id($id, $ip_changed, $name_changed, $detail_changed, $status_changed, $update_by)
    {
        $data = array(
            'node_ip' => $ip_changed,
            'node_name' => $name_changed,
            'node_detail' => $detail_changed,
            'node_status' => $status_changed,
            'update_by' => $update_by,
            'update_time' => date("Y-m-d h:i:s")
        );

        $this->db->where('node_id', $id);
        $result = $this->db->update('serv_node', $data);
        if ($result) {
            return array("id" => $id, "node_ip" => $ip_changed, "node_name" => $name_changed, "node_detail" => $detail_changed, "node_status" => $status_changed, "update_time" => date("Y-m-d h:i:s"));
        } else {
            return false;
        }
    }

    public function create_node($create_ip, $create_name, $create_detail, $create_status, $update_by)
    {

        $data = array(
            'node_ip' => $create_ip,
            'node_name' => $create_name,
            'node_detail' => $create_detail,
            'node_status' => $create_status,
            'create_by' => $update_by,
            'create_time' => date("Y-m-d h:i:s"),
            'deleted' => 0
        );

        $result = $this->db->insert('serv_node', $data);
        $insert_id = $this->db->insert_id();

        $this->db->select('node_ip');
        $this->db->from('serv_node');
        $this->db->where('deleted', '0');
        $result2 = $this->db->get();
        $lenght_row = count($result2->result_array());


        if ($result) {
            return array("lenght_row" => $lenght_row, "node_time" => date("Y-m-d h:i:s"), "id" => $insert_id, "node_ip" => $create_ip, "node_name" => $create_name, "node_detail" => $create_detail, "node_status" => $create_status, "create_time" => date("Y-m-d h:i:s"));
        } else {
            return false;
        }
    }
    public function delete_node($id, $update_by)
    {
        $data = array(
            'update_by' => $update_by,
            'update_time' => date("Y-m-d h:i:s"),
            'deleted' => 1
        );
        $this->db->where('node_id', $id);
        $result = $this->db->update('serv_node', $data);
        if ($result) {
            return array("id" => $id);
        } else {
            return false;
        }
    }
}
