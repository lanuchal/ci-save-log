<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_ma_permission extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    public function get_ma_permission()
    {
        $this->db->select('permission_id,permission_name,permission_detail,permission_set,permission_status,create_time,update_time');
        $this->db->from('serv_permission');
        $this->db->where('deleted', '0');
        $this->db->where('permission_status', '1');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function change_permission_set($id, $data)
    {
        $data = array(
            'permission_set' => $data,
            'update_by' => $this->session->userdata('req_NUM_OT'),
            'update_time' => date("Y-m-d h:i:s")
        );

        $this->db->where('permission_id', $id);
        $this->db->update('serv_permission', $data);
        $this->db->select('permission_set,permission_id');
        $this->db->from('serv_permission');
        $this->db->where('permission_id', $id);
        $this->db->where('deleted', '0');
        $result2 = $this->db->get();

        return $result2->result_array();
    }

    public function get_permission_set($id)
    {
        $this->db->select('permission_set,permission_id');
        $this->db->from('serv_permission');
        $this->db->where('permission_id', $id);
        $this->db->where('deleted', '0');
        $result = $this->db->get();
        return $result->result_array();
    }
}
