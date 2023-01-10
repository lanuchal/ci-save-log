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
	}
	public function index()
	{
		if (!$this->check_isreq_validated()) {
			$this->data['current_url'] = $this->uri->uri_string();
			$this->loadViewPageAuth(array('pages/auth/auth-login'));
		} else {
			$this->data['row_ma_user'] = $this->modelMaUser->get_ma_user();
			$this->data['row_user'] = $this->modelMaUser->get_user();
			$this->data['row_permission'] = $this->modelPermission->get_permission_status_on();

			$this->loadView(array('pages/dashboard/manage/ma-user'));
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


		$result = $this->modelMaUser->update_user_permission($id, $permission_id, $permission_name);
		echo json_encode($result);
	}
	public function create_ma_user()
	{
		$num_ot = $this->security->xss_clean($this->input->post('num_ot'));
		$user_name = $this->security->xss_clean($this->input->post('user_name'));
		$permission_id = $this->security->xss_clean($this->input->post('permission_id'));
		$permission_name = $this->security->xss_clean($this->input->post('permission_name'));


		$result = $this->modelMaUser->create_ma_user($num_ot, $permission_id, $permission_name, $user_name);
		echo json_encode($result);
	}

	public function delete_user()
	{
		$id = $this->security->xss_clean($this->input->post('id'));

		$result = $this->modelMaUser->delete_user($id);
		echo json_encode($result);
	}
}
