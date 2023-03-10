<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_auth extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('../../../website_cmex_helper/php/hash_helper');
    }

    public function validate($username, $password)
    {
        // $password = getHash($password);

        $this->db->select('serv_use.NUM_OT,tb_person.Fname, tb_person.Lname, tb_position.position_name,serv_permission.permission_set,serv_permission.permission_name,serv_use.permission_id');
        $this->db->from('serv_use');
        $this->db->join('tb_nuser', 'serv_use.NUM_OT = tb_nuser.NUM_OT');
        $this->db->join('tb_position', 'tb_nuser.PP = tb_position.position_code');
        $this->db->join('tb_person', 'serv_use.NUM_OT = tb_person.NUM_OT');
        $this->db->join('serv_permission', 'serv_use.permission_id = serv_permission.permission_id');
        $this->db->where('serv_use.NUM_OT', $username);
        $this->db->where('tb_nuser.Upass', $password);
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            $row = $result->row_array();
            $data = array(
                'req_validated' => true,
                'req_NUM_OT'  => $row['NUM_OT'],
                'req_Fname'  => $row['Fname'],
                'req_Lname'  => $row['Lname'],
                'req_position_name'  => $row['position_name'],
                'req_permission_id'  => $row['permission_id'],
                'req_permission_name'  => $row['permission_name'],
                'req_permission_set'  => $row['permission_set']
            );
            $this->session->sess_expiration = 86400;
            // $this->session->sess_expiration = 60;
            $this->session->set_userdata($data);


            $data2 = array(
                'deleted' => '0'
            );
            $this->db->where('serv_use.NUM_OT', $username);
            $this->db->update('serv_use', $data2);

            return array(
                'req_permission_set'  => $row['permission_set'],
            );
        } else {
            $data = array(
                'req_validated' => false
            );
            $this->session->set_userdata($data);
            return 0;
        }
    }

    public function validate_permission()
    {
        $this->db->select('serv_use.NUM_OT,deleted');
        $this->db->from('serv_use');
        $this->db->where('serv_use.NUM_OT', $this->session->userdata('req_NUM_OT'));
        // $this->db->where('serv_use.NUM_OT', '65047');
        $result = $this->db->get();
        return $result->result_array();
    }
}
