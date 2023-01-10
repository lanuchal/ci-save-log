<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_request extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_req()
    {
        $this->db->select('	cre.Fname AS cre_Fname, 
        cre.Lname AS cre_Lname, 
        wit.Fname AS wit_Fname, 
        wit.Lname AS wit_Lname, 
        serv_title_req.req_title_name, 
        serv_request.req_detial, 
        serv_request.create_by, 
        serv_request.req_status, 
        serv_request.create_time, 
        serv_request.update_time, 
        serv_request.req_id, 
        serv_node.node_name,
        aec.Fname, 
        aec.Lname');
        $this->db->from('serv_request');
        $this->db->join('tb_person AS wit', 'serv_request.req_witness = wit.NUM_OT');
        $this->db->join('tb_person AS cre', 'serv_request.create_by = cre.NUM_OT');
        $this->db->join('serv_title_req', 'serv_request.req_title_id = serv_title_req.req_title_id');
        $this->db->join('serv_node', 'serv_request.node_id = serv_node.node_id');
        $this->db->join('tb_person AS aec', 'serv_request.req_aeccess = aec.NUM_OT', 'left');
        $this->db->where('serv_request.deleted', '0');
        $this->db->order_by('serv_request.req_id', 'DESC');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_req_id($id)
    {
        $this->db->select('	serv_node.node_id, 
        serv_node.node_name, 
        serv_title_req.req_title_id, 
        serv_title_req.req_title_name, 
        serv_request.req_detial, 
        wit.NUM_OT AS wit_id,
        wit.Fname AS wit_Fname, 
        wit.Lname AS wit_Lname, 
        serv_request.req_id');
        $this->db->from('serv_request');
        $this->db->join('tb_person AS wit', 'serv_request.req_witness = wit.NUM_OT');
        $this->db->join('serv_title_req', 'serv_request.req_title_id = serv_title_req.req_title_id');
        $this->db->join('serv_node', 'serv_request.node_id = serv_node.node_id');
        $this->db->where('serv_request.req_id', $id);
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

    public function update_req_id($id, $title_id, $node_id, $witness_id, $change_detail)
    {

        $data = array(
            'node_id' => $node_id,
            'req_title_id' => $title_id,
            'req_detial' => $change_detail,
            'req_witness' => $witness_id,
            'update_by' => $this->session->userdata('req_NUM_OT'),
            'update_time' => date("Y-m-d h:i:s")
        );

        $this->db->where('req_id', $id);
        $this->db->update('serv_request', $data);
        return array("id" => $id, "update_time" => date("Y-m-d"));


        // $data = array(
        //     'node_id' => $node_id,
        //     'req_title_id' => $title_id,
        //     'req_detial' => $change_detail,
        //     'req_witness' => $witness_id,
        //     'update_by' => $this->session->userdata('req_NUM_OT'),
        //     'update_time' => date("Y-m-d h:i:s")
        // );

        // $this->db->where('req_id', $id);
        // $result = $this->db->update('serv_request', $data);
        // if ($result) {
        //     return array("id" => $id, "permission_name" => $permission_name, "update_time" => date("Y-m-d h:i:s"));
        // } else {
        //     return false;
        // }
    }

    public function create_req($node_id, $node_name, $witness_id, $witness_name, $title_id, $title_name, $create_detail)
    {

        $data = array(
            'node_id' => $node_id,
            'req_title_id' => $title_id,
            'req_detial' => $create_detail,
            'req_witness' => $witness_id,
            'create_by' => $this->session->userdata('req_NUM_OT'),
            'create_time' => date("Y-m-d h:i:s"),
            'deleted' => 0
        );

        $result = $this->db->insert('serv_request', $data);
        $insert_id = $this->db->insert_id();

        $this->db->select('node_id');
        $this->db->from('serv_request');
        $this->db->where('deleted', '0');
        $result2 = $this->db->get();
        $lenght_row = count($result2->result_array());


        if ($result) {
            return array("lenght_row" => $lenght_row, "user_time" => date("Y-m-d h:i:s"), "id" => $insert_id, "node_id" => $node_id, "node_name" => $node_name, "witness_id" => $witness_id, "witness_name" => $witness_name, "req_title_id" => $title_id, "title_name" => $title_name,);
        } else {
            return false;
        }
    }
    public function access_req($id)
    {
        $data = array(
            'req_status' => 1,
            'req_aeccess' => $this->session->userdata('req_NUM_OT'),
        );
        $this->db->where('req_id', $id);
        $result = $this->db->update('serv_request', $data);

        $this->db->select('tb_person.Fname,tb_person.Lname,tb_nuser.NUM_OT');
        $this->db->from('tb_nuser');
        $this->db->join('tb_person', 'tb_nuser.NUM_OT = tb_person.NUM_OT');
        $this->db->where('tb_person.NUM_OT', $this->session->userdata('req_NUM_OT'));
        $result2 = $this->db->get();

        if ($result) {
            return array("id" => $id, "req_status" => '1', 'user_access' => $result2->result_array());
        } else {
            return false;
        }
    }
    public function access_cancel($id)
    {
        $data = array(
            'req_status' => 2,
            'req_aeccess' => $this->session->userdata('req_NUM_OT'),
        );
        $this->db->where('req_id', $id);
        $result = $this->db->update('serv_request', $data);

        $this->db->select('tb_person.Fname,tb_person.Lname,tb_nuser.NUM_OT');
        $this->db->from('tb_nuser');
        $this->db->join('tb_person', 'tb_nuser.NUM_OT = tb_person.NUM_OT');
        $this->db->where('tb_person.NUM_OT', $this->session->userdata('req_NUM_OT'));
        $result2 = $this->db->get();

        if ($result) {
            return array("id" => $id, "req_status" => '2', 'user_access' => $result2->result_array());
        } else {
            return false;
        }
    }
    
    public function delete_req($id)
    {
        $data = array(
            'update_by' => $this->session->userdata('req_NUM_OT'),
            'update_time' => date("Y-m-d h:i:s"),
            'deleted' => 1
        );
        $this->db->where('req_id', $id);
        $result = $this->db->update('serv_request', $data);
        if ($result) {
            return array("id" => $id);
        } else {
            return false;
        }
    }
}
