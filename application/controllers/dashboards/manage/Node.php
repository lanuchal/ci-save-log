<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Node extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Bangkok');
		$this->load->model('dashboards/manage/Model_node', 'modelNode');
	}

	public function index()
	{


		if (!$this->check_isreq_validated()) {

			$this->data['current_url'] = $this->uri->uri_string();

			$this->loadViewPageAuth(array('pages/auth/auth-login', 'pages/auth/auth-login-script'));
		} else {
			$json_data = $this->session->userdata('req_permission_set');
			$object = json_decode($json_data, true);
			if ($object['server_menu']) {
				$this->data['row_title_head'] = "จัดการ server";
				$this->data['row_node'] = $this->modelNode->get_node();
				$this->loadView(array('pages/dashboard/manage/node','pages/dashboard/manage/node-script'));
			} else {
				header("Location: " . base_url('dashboard') . "");
			}
		}
	}

	public function get_node()
	{
		$result = $this->modelNode->get_node();
		echo json_encode($result);
	}

	public function get_node_id()
	{
		$id = $this->security->xss_clean($this->input->post('id'));
		$result = $this->modelNode->get_node_id($id);
		echo json_encode($result);
	}

	public function update_node_id()
	{
		$id = $this->security->xss_clean($this->input->post('id'));
		$ip_changed = $this->security->xss_clean($this->input->post('ip_changed'));
		$name_changed = $this->security->xss_clean($this->input->post('name_changed'));
		$detail_changed = $this->security->xss_clean($this->input->post('detail_changed'));
		$status_changed = $this->security->xss_clean($this->input->post('status_changed'));


		$result = $this->modelNode->update_node_id($id, $ip_changed, $name_changed, $detail_changed, $status_changed,);
		echo json_encode($result);
	}
	public function create_node()
	{
		$create_ip = $this->security->xss_clean($this->input->post('create_ip'));
		$create_name = $this->security->xss_clean($this->input->post('create_name'));
		$create_detail = $this->security->xss_clean($this->input->post('create_detail'));
		$create_status = $this->security->xss_clean($this->input->post('create_status'));


		$result = $this->modelNode->create_node($create_ip, $create_name, $create_detail, $create_status,);
		echo json_encode($result);
	}

	public function delete_node()
	{
		$id = $this->security->xss_clean($this->input->post('id'));

		$result = $this->modelNode->delete_node($id);
		echo json_encode($result);
	}
}
