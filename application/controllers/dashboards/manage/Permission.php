<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permission extends MY_Controller
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
	}
	public function index()
	{



		if (!$this->check_isreq_validated()) {

			$this->data['current_url'] = $this->uri->uri_string();
			$this->loadViewPageAuth(array('pages/auth/auth-login'));
		} else {
			$json_data = $this->session->userdata('req_permission_set');
			$object = json_decode($json_data, true);
			if ($object['permission_menu']) {

				$this->data['row_title_head'] = "จัดการสิทธิ์ในการใช้งาน";
				$this->data['row_permission'] = $this->modelPermission->get_permission();
				$this->loadView(array('pages/dashboard/manage/permission'));
			} else {
				header("Location: " . base_url('dashboard') . "");
			}


		}
	}
	public function get_permission_id()
	{

		$id = $this->security->xss_clean($this->input->post('id'));
		$result = $this->modelPermission->get_permission_id($id);
		echo json_encode($result);
	}

	public function update_permission_id()
	{
		$id = $this->security->xss_clean($this->input->post('id'));
		$name_changed = $this->security->xss_clean($this->input->post('name_changed'));
		$detail_changed = $this->security->xss_clean($this->input->post('detail_changed'));
		$status_changed = $this->security->xss_clean($this->input->post('status_changed'));


		$result = $this->modelPermission->update_permission_id($id, $name_changed, $detail_changed, $status_changed);
		echo json_encode($result);
	}
	public function create_permission()
	{
		$create_name = $this->security->xss_clean($this->input->post('create_name'));
		$create_detail = $this->security->xss_clean($this->input->post('create_detail'));
		$create_status = $this->security->xss_clean($this->input->post('create_status'));
		$data = $this->security->xss_clean($this->input->post('data'));


		$result = $this->modelPermission->create_permission($create_name, $create_detail, $create_status, $data);
		echo json_encode($result);
	}

	public function delete_permission()
	{
		$id = $this->security->xss_clean($this->input->post('id'));

		$result = $this->modelPermission->delete_permission($id);
		echo json_encode($result);
	}
}
