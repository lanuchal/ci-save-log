<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_ma_user extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_ma_user()
    {
        $this->db->select('serv_use.NUM_OT, tb_person.Fname, tb_person.Lname, serv_permission.permission_name,serv_use.create_time,serv_use.update_time,serv_permission.permission_id');
        $this->db->from('tb_nuser');
        $this->db->join('tb_person', 'tb_nuser.NUM_OT = tb_person.NUM_OT');
        $this->db->join('serv_use', 'serv_use.NUM_OT = tb_nuser.NUM_OT');
        $this->db->join('serv_permission', 'serv_use.permission_id = serv_permission.permission_id');
        $this->db->order_by("serv_use.create_time", "asc");
        $this->db->where('serv_use.deleted', '0');
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_user()
    {
        $this->db->select('tb_person.Fname,tb_person.Lname,tb_nuser.NUM_OT');
        $this->db->from('tb_nuser');
        $this->db->join('tb_person', 'tb_nuser.NUM_OT = tb_person.NUM_OT');
        $this->db->where('tb_nuser.deleted', '0');
        $result = $this->db->get();

        return $result->result_array();
    }


    public function get_user_permission($id)
    {
        $this->db->select('serv_use.permission_id,serv_permission.permission_name');
        $this->db->from('serv_use');
        $this->db->join('serv_permission', 'serv_use.permission_id = serv_permission.permission_id');
        $this->db->where('serv_use.NUM_OT', $id);
        $result = $this->db->get();
        return $result->result_array();
    }
    public function get_ma_user_id($id)
    {
        $this->db->select('serv_use.NUM_OT, tb_person.Fname, tb_person.Lname, serv_permission.permission_name');
        $this->db->from('serv_use');
        $this->db->join('serv_permission', 'serv_use.permission_id = serv_permission.permission_id');
        $this->db->join('tb_person', 'serv_use.NUM_OT = tb_person.NUM_OT');
        $this->db->where('serv_use.NUM_OT', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function update_user_permission($id, $permission_id, $permission_name)
    {
        $data = array(
            'permission_id' => $permission_id,
            'update_by' => $this->session->userdata('req_NUM_OT'),
            'update_time' => date("Y-m-d h:i:s")
        );

        $this->db->where('NUM_OT', $id);
        $result = $this->db->update('serv_use', $data);
        if ($result) {
            return array("id" => $id, "permission_name" => $permission_name, "update_time" => date("Y-m-d h:i:s"));
        } else {
            return false;
        }
    }

    public function create_ma_user($num_ot, $permission_id, $permission_name, $name)
    {

        $data = array(
            'NUM_OT' => $num_ot,
            'permission_id' => $permission_id,
            'create_by' => $this->session->userdata('req_NUM_OT'),
            'create_time' => date("Y-m-d h:i:s"),
            'deleted' => 0
        );

        $result = $this->db->insert('serv_use', $data);
        $insert_id = $this->db->insert_id();

        $this->db->select('NUM_OT');
        $this->db->from('serv_use');
        $this->db->where('deleted', '0');
        $result2 = $this->db->get();
        $lenght_row = count($result2->result_array());


        if ($result) {
            return array("lenght_row" => $lenght_row, "user_time" => date("Y-m-d h:i:s"), "id" => $insert_id, "num_ot" => $num_ot, "permission_id" => $permission_id, "name" => $name, "permission_name" => $permission_name);
        } else {
            return false;
        }
    }
    public function delete_user($id)
    {
        $data = array(
            'update_by' => $this->session->userdata('req_NUM_OT'),
            'update_time' => date("Y-m-d h:i:s"),
            'deleted' => 1
        );
        $this->db->where('NUM_OT', $id);
        $result = $this->db->update('serv_use', $data);
        if ($result) {
            return array("id" => $id);
        } else {
            return false;
        }
    }
}
