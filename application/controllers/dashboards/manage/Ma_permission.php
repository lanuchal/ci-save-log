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
        $this->data['row_permission'] = $this->modelPermission->get_permission();
        $this->loadView(array('pages/dashboard/manage/ma-permission'));
    }
    public function change_permission_set()
    {
        $update_by = '65047';
        $id = $this->security->xss_clean($this->input->post('id'));
        $data = $this->security->xss_clean($this->input->post('data'));
        $result = $this->modelMaPermission->change_permission_set($id, $data, $update_by);
        echo json_encode($result);
    }
}
