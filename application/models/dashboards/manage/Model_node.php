<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_node extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    // use 000000000000
    public function get_node()
    {
        $result = $this->db->get('serv_node');
        return $result->result_array();
    }
}
