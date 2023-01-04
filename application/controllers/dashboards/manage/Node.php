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
		$this->data['row_node'] = $this->modelNode->get_node();

		$this->loadView(array('pages/dashboard/manage/node'));
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

		$update_by = '65047';

		$result = $this->modelNode->update_node_id($id, $ip_changed, $name_changed, $detail_changed, $status_changed, $update_by);
		echo json_encode($result);
	}
	public function create_node()
	{
		$create_ip = $this->security->xss_clean($this->input->post('create_ip'));
		$create_name = $this->security->xss_clean($this->input->post('create_name'));
		$create_detail = $this->security->xss_clean($this->input->post('create_detail'));
		$create_status = $this->security->xss_clean($this->input->post('create_status'));

		$update_by = '65047';

		$result = $this->modelNode->create_node($create_ip, $create_name, $create_detail, $create_status, $update_by);
		echo json_encode($result);
	}

	public function delete_node()
	{
		$id = $this->security->xss_clean($this->input->post('id'));
		$update_by = '65047';

		$result = $this->modelNode->delete_node($id, $update_by);
		echo json_encode($result);
	}
}
