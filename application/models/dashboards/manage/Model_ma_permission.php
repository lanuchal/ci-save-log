<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_ma_permission extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }



    public function change_permission_set($id, $data, $update_by)
    {
        $data = array(
            'permission_set' => $data,
            'update_by' => $update_by,
            'update_time' => date("Y-m-d h:i:s")
        );

        $this->db->where('permission_id', $id);
        $this->db->update('serv_permission', $data);
        return true;
    }
}
