<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_permission extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_permission()
    {
        $this->db->select('permission_id,permission_name,permission_detail,permission_status,create_time,update_time');
        $this->db->from('serv_permission');
        $this->db->where('deleted', '0');
        $result = $this->db->get();
        return $result->result_array();
    }


    public function get_permission_id($id)
    {
        $this->db->select('permission_id,permission_name,permission_detail,permission_status,create_time,update_time');
        $this->db->from('serv_permission');
        $this->db->where('permission_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

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
        } else {
            return false;
        }
    }

    public function create_permission($create_name, $create_detail, $create_status, $update_by)
    {

        $data = array(
            'permission_name' => $create_name,
            'permission_detail' => $create_detail,
            'permission_status' => $create_status,
            'create_by' => $update_by,
            'create_time' => date("Y-m-d h:i:s"),
            'deleted' => 0
        );

        $result = $this->db->insert('serv_permission', $data);
        $insert_id = $this->db->insert_id();

        $this->db->select('permission_id');
        $this->db->from('serv_permission');
        $this->db->where('deleted', '0');
        $result2 = $this->db->get();
        $lenght_row = count($result2->result_array());


        if ($result) {
            return array("lenght_row" => $lenght_row, "permission_time" => date("Y-m-d h:i:s"), "id" => $insert_id, "permission_name" => $create_name, "permission_detail" => $create_detail, "permission_status" => $create_status, "create_time" => date("Y-m-d h:i:s"));
        } else {
            return false;
        }
    }
    public function delete_permission($id, $update_by)
    {
        $data = array(
            'update_by' => $update_by,
            'update_time' => date("Y-m-d h:i:s"),
            'deleted' => 1
        );
        $this->db->where('permission_id', $id);
        $result = $this->db->update('serv_permission', $data);
        if ($result) {
            return array("id" => $id);
        } else {
            return false;
        }
    }
}