<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ma_user extends MY_Controller
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
		$this->load->model('dashboards/manage/Model_ma_user', 'modelMaUser');
		$this->load->model('dashboards/manage/Model_permission', 'modelPermission');
		$this->load->model('Model_table_id', 'modelTableId');
	}
	public function index()
	{
		if (!$this->check_isreq_validated()) {
			$this->data['current_url'] = $this->uri->uri_string();
			$this->loadViewPageAuth(array('pages/auth/auth-login'));
		} else {

			$json_data = $this->session->userdata('req_permission_set');
			$object = json_decode($json_data, true);
			if ($object['user_menu']) {
				$this->data['row_title_head'] = "กำหนดผู้ใช้งาน";
				$this->data['row_ma_user'] = $this->modelMaUser->get_ma_user();
				$this->data['row_user'] = $this->modelMaUser->get_user();
				$this->data['row_permission'] = $this->modelPermission->get_permission_status_on();
	
				$this->loadView(array('pages/dashboard/manage/ma-user'));
			} else {
				header("Location: " . base_url('dashboard') . "");
			}


		}
	}
	public function get_user_permission()
	{
		$id = $this->security->xss_clean($this->input->post('id'));
		$result = $this->modelMaUser->get_user_permission($id);
		echo json_encode($result);
	}
	public function get_ma_user_id()
	{
		$id = $this->security->xss_clean($this->input->post('id'));
		$result = $this->modelMaUser->get_ma_user_id($id);
		echo json_encode($result);
	}
	public function update_user_permission()
	{
		$id = $this->security->xss_clean($this->input->post('id'));
		$permission_id = $this->security->xss_clean($this->input->post('permission_id'));
		$permission_name = $this->security->xss_clean($this->input->post('permission_name'));

		$result_permission_id  = sizeof($this->modelTableId->get_table_id('serv_permission', 'permission_id', $permission_id));

		$result = (!$result_permission_id) ?
			array("status" => '0', "result_permission_id" => $result_permission_id) :
			$result = $this->modelMaUser->update_user_permission($id, $permission_id, $permission_name);
		echo json_encode($result);


		// $result = $this->modelMaUser->update_user_permission($id, $permission_id, $permission_name);
		// echo json_encode($result);
	}
	public function create_ma_user()
	{

		$num_ot = $this->security->xss_clean($this->input->post('num_ot'));
		$user_name = $this->security->xss_clean($this->input->post('user_name'));
		$permission_id = $this->security->xss_clean($this->input->post('permission_id'));
		$permission_name = $this->security->xss_clean($this->input->post('permission_name'));


		$result_num_ot = sizeof($this->modelTableId->get_table_id('tb_person', 'NUM_OT', $num_ot));
		$result_permission_id  = sizeof($this->modelTableId->get_table_id('serv_permission', 'permission_id', $permission_id));

		$result = (!$result_num_ot || !$result_permission_id) ?
			array("status" => '0', "result_num_ot" => $result_num_ot, "result_permission_id" => $result_permission_id) :
			$result = $this->modelMaUser->create_ma_user($num_ot, $permission_id, $permission_name, $user_name);
		echo json_encode($result);


		// $result = $this->modelMaUser->create_ma_user($num_ot, $permission_id, $permission_name, $user_name);
		// echo json_encode($result);
	}

	public function delete_user()
	{
		$id = $this->security->xss_clean($this->input->post('id'));

		$result = $this->modelMaUser->delete_user($id);
		echo json_encode($result);
	}
}
