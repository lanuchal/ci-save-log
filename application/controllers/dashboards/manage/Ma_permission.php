<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ma_permission extends MY_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        $this->load->model('dashboards/manage/Model_permission', 'modelPermission');
        $this->load->model('dashboards/manage/Model_ma_permission', 'modelMaPermission');
    }

    public function index()
    {
        // $this->session->set_userdata('last_url', $nav_uri);

        if (!$this->check_isreq_validated()) {

            $this->data['current_url'] = $this->uri->uri_string();

            $this->loadViewPageAuth(array('pages/auth/auth-login'));
        } else {

            $json_data = $this->session->userdata('req_permission_set');
            $object = json_decode($json_data, true);
            if ($object['permission_menu']) {
                $this->data['row_title_head'] = "กำหนดสิทธิ์ในการใช้งาน";
                $this->data['row_permission'] = $this->modelMaPermission->get_ma_permission();

                $this->loadView(array('pages/dashboard/manage/ma-permission'));
            } else {
                header("Location: " . base_url('dashboard') . "");
            }
        }
    }
    public function change_permission_set()
    {
        $id = $this->security->xss_clean($this->input->post('id'));
        $data = $this->security->xss_clean($this->input->post('data'));
        $result = $this->modelMaPermission->change_permission_set($id, $data);
        echo json_encode($result);
    }
    public function get_permission_set()
    {
        $id = $this->security->xss_clean($this->input->post('id'));
        $result = $this->modelMaPermission->get_permission_set($id);
        echo json_encode($result);
    }
}
