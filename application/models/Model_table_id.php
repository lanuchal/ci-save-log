<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_table_id extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_table_id($table, $id, $id_input)
    {
        $this->db->select($id);
        $this->db->from($table);
        $this->db->where($id, $id_input);
        $result = $this->db->get();
        return $result->result_array();
    }
}
