<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_title extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_title()
    {
        $this->db->select('req_title_id,req_title_name,req_title_detail,create_time,update_time');
        $this->db->from('serv_title_req');
        $this->db->where('deleted', '0');
        $result = $this->db->get();
        return $result->result_array();
    }


    public function get_title_id($id)
    {
        $this->db->select('req_title_id,req_title_name,req_title_detail');
        $this->db->from('serv_title_req');
        $this->db->where('req_title_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function update_title_id($id, $name_changed, $detail_changed)
    {
        $data = array(
            'req_title_name' => $name_changed,
            'req_title_detail' => $detail_changed,
            'update_by' => $this->session->userdata('req_NUM_OT'),
            'update_time' => date("Y-m-d h:i:s")
        );

        $this->db->where('req_title_id', $id);
        $result = $this->db->update('serv_title_req', $data);
        if ($result) {
            return array("id" => $id, "req_title_name" => $name_changed, "req_title_detail" => $detail_changed, "update_time" => date("Y-m-d h:i:s"));
        } else {
            return false;
        }
    }

    public function create_title($create_name, $create_detail)
    {

        $data = array(
            'req_title_name' => $create_name,
            'req_title_detail' => $create_detail,
            'create_by' => $this->session->userdata('req_NUM_OT'),
            'create_time' => date("Y-m-d h:i:s"),
            'deleted' => 0
        );
        $result = $this->db->insert('serv_title_req', $data);
        $insert_id = $this->db->insert_id();

        $this->db->select('req_title_id');
        $this->db->from('serv_title_req');
        $this->db->where('deleted', '0');
        $result2 = $this->db->get();
        $lenght_row = count($result2->result_array());


        if ($result) {
            return array("lenght_row" => $lenght_row, "title_time" => date("Y-m-d h:i:s"), "id" => $insert_id, "req_title_name" => $create_name, "req_title_detail" => $create_detail, "create_time" => date("Y-m-d h:i:s"));
        } else {
            return false;
        }
    }
    public function delete_title($id)
    {
        $data = array(
            'update_by' => $this->session->userdata('req_NUM_OT'),
            'update_time' => date("Y-m-d h:i:s"),
            'deleted' => 1
        );
        $this->db->where('req_title_id', $id);
        $result = $this->db->update('serv_title_req', $data);
        if ($result) {
            return array("id" => $id);
        } else {
            return false;
        }
    }
}