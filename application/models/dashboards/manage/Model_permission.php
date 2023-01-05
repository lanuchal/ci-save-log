<?php
<<<<<<< HEAD
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
=======
if (!defined('BASEPATH')) exit('No direct script access allowed');
>>>>>>> fb472747948458b90ddb40fbbffe849de40583f4

class Model_permission extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

<<<<<<< HEAD
    public function get_permission()
    {
        $this->db->select('permission_id,permission_name,permission_detail,permission_status,create_time,update_time');
        $this->db->from('serv_permission');
=======
    public function get_node()
    {
        $this->db->select('*');
        $this->db->from('serv_node');
>>>>>>> fb472747948458b90ddb40fbbffe849de40583f4
        $this->db->where('deleted', '0');
        $result = $this->db->get();
        return $result->result_array();
    }


<<<<<<< HEAD
    public function get_permission_id($id)
    {
        $this->db->select('permission_id,permission_name,permission_detail,permission_status,create_time,update_time');
        $this->db->from('serv_permission');
        $this->db->where('permission_id', $id);
=======
    public function get_node_id($id)
    {
        $this->db->select('node_id,node_ip,node_name,node_detail,node_status');
        $this->db->from('serv_node');
        $this->db->where('node_id', $id);
>>>>>>> fb472747948458b90ddb40fbbffe849de40583f4
        $result = $this->db->get();
        return $result->result_array();
    }

<<<<<<< HEAD
    public function update_permission_id($id, $name_changed, $detail_changed, $status_changed, $update_by)
    {
        $data = array(
            'permission_name' => $name_changed,
            'permission_detail' => $detail_changed,
            'permission_status' => $status_changed,
            'update_by' => $update_by,
            'update_time' => date("Y-m-d h:i:s")
        );

        $this->db->where('permission_id', $id);
        $result = $this->db->update('serv_permission', $data);
        if ($result) {
            return array("id" => $id, "permission_name" => $name_changed, "permission_detail" => $detail_changed, "permission_status" => $status_changed, "update_time" => date("Y-m-d h:i:s"));
=======
    public function update_node_id($id, $ip_changed, $name_changed, $detail_changed, $status_changed, $update_by)
    {
        $data = array(
            'node_ip' => $ip_changed,
            'node_name' => $name_changed,
            'node_detail' => $detail_changed,
            'node_status' => $status_changed,
            'update_by' => $update_by,
            'update_time' => date("Y-m-d h:i:s"),
            'deleted' => 0
        );

        $this->db->where('node_id', $id);
        $result = $this->db->update('serv_node', $data);
        if ($result) {
            return array("id" => $id, "node_ip" => $ip_changed, "node_name" => $name_changed, "node_detail" => $detail_changed, "node_status" => $status_changed, "update_time" => date("Y-m-d h:i:s"));
>>>>>>> fb472747948458b90ddb40fbbffe849de40583f4
        } else {
            return false;
        }
    }

<<<<<<< HEAD
    public function create_permission($create_name, $create_detail, $create_status, $update_by)
    {

        $data = array(
            'permission_name' => $create_name,
            'permission_detail' => $create_detail,
            'permission_status' => $create_status,
=======
    public function create_node($create_ip, $create_name, $create_detail, $create_status, $update_by)
    {

        $data = array(
            'node_ip' => $create_ip,
            'node_name' => $create_name,
            'node_detail' => $create_detail,
            'node_status' => $create_status,
>>>>>>> fb472747948458b90ddb40fbbffe849de40583f4
            'create_by' => $update_by,
            'create_time' => date("Y-m-d h:i:s"),
            'deleted' => 0
        );

<<<<<<< HEAD
        $result = $this->db->insert('serv_permission', $data);
        $insert_id = $this->db->insert_id();

        $this->db->select('permission_id');
        $this->db->from('serv_permission');
=======
        $result = $this->db->insert('serv_node', $data);
        $insert_id = $this->db->insert_id();

        $this->db->select('node_ip');
        $this->db->from('serv_node');
>>>>>>> fb472747948458b90ddb40fbbffe849de40583f4
        $this->db->where('deleted', '0');
        $result2 = $this->db->get();
        $lenght_row = count($result2->result_array());


        if ($result) {
<<<<<<< HEAD
            return array("lenght_row" => $lenght_row, "permission_time" => date("Y-m-d h:i:s"), "id" => $insert_id, "permission_name" => $create_name, "permission_detail" => $create_detail, "permission_status" => $create_status, "create_time" => date("Y-m-d h:i:s"));
=======
            return array("lenght_row" => $lenght_row, "node_time" => date("Y-m-d h:i:s"), "id" => $insert_id, "node_ip" => $create_ip, "node_name" => $create_name, "node_detail" => $create_detail, "node_status" => $create_status, "create_time" => date("Y-m-d h:i:s"));
>>>>>>> fb472747948458b90ddb40fbbffe849de40583f4
        } else {
            return false;
        }
    }
<<<<<<< HEAD
    public function delete_permission($id, $update_by)
=======
    public function delete_node($id, $update_by)
>>>>>>> fb472747948458b90ddb40fbbffe849de40583f4
    {
        $data = array(
            'update_by' => $update_by,
            'update_time' => date("Y-m-d h:i:s"),
            'deleted' => 1
        );
<<<<<<< HEAD
        $this->db->where('permission_id', $id);
        $result = $this->db->update('serv_permission', $data);
=======
        $this->db->where('node_id', $id);
        $result = $this->db->update('serv_node', $data);
>>>>>>> fb472747948458b90ddb40fbbffe849de40583f4
        if ($result) {
            return array("id" => $id);
        } else {
            return false;
        }
    }
}
