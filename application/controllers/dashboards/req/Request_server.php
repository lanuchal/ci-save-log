<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request_server extends MY_Controller
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
		$this->load->model('dashboards/req/Model_request', 'modelRequest');
		$this->load->model('dashboards/manage/Model_permission', 'modelPermission');
		$this->load->model('dashboards/manage/Model_title', 'ModelTitle');
		$this->load->model('dashboards/manage/Model_ma_user', 'modelMaUser');
		$this->load->model('dashboards/manage/Model_node', 'modelNode');
	}
	public function index()
	{
		if (!$this->check_isreq_validated()) {

			$this->data['current_url'] = $this->uri->uri_string();
			$this->loadViewPageAuth(array('pages/auth/auth-login'));
		} else {
			$this->data['row_title'] = $this->ModelTitle->get_title();
			$this->data['row_ma_user'] = $this->modelMaUser->get_ma_user();
			$this->data['row_node'] = $this->modelNode->get_node_req();
			$this->data['row_req'] = $this->modelRequest->get_req();
			$this->loadView(array('pages/dashboard/req/request-server'));
		}
	}
	public function get_req_id()
	{
		$id = $this->security->xss_clean($this->input->post('id'));
		$result = $this->modelRequest->get_req_id($id);
		echo json_encode($result);
	}
	public function get_ma_user_id()
	{
		$id = $this->security->xss_clean($this->input->post('id'));
		$result = $this->modelRequest->get_ma_user_id($id);
		echo json_encode($result);
	}
	public function update_req_id()
	{
		$id = $this->security->xss_clean($this->input->post('id'));
		$title_id = $this->security->xss_clean($this->input->post('title_id'));
		$node_id = $this->security->xss_clean($this->input->post('node_id'));
		$witness_id = $this->security->xss_clean($this->input->post('witness_id'));
		$change_detail = $this->security->xss_clean($this->input->post('change_detail'));


		$result = $this->modelRequest->update_req_id($id, $title_id, $node_id, $witness_id, $change_detail);
		echo json_encode($result);
	}
	public function create_req()
	{
		$node_id = $this->security->xss_clean($this->input->post('node_id'));
		$node_name = $this->security->xss_clean($this->input->post('node_name'));
		$witness_id = $this->security->xss_clean($this->input->post('witness_id'));
		$witness_name = $this->security->xss_clean($this->input->post('witness_name'));
		$title_id = $this->security->xss_clean($this->input->post('title_id'));
		$title_name = $this->security->xss_clean($this->input->post('title_name'));
		$create_detail = $this->security->xss_clean($this->input->post('create_detail'));

		$result = $this->modelRequest->create_req($node_id, $node_name, $witness_id, $witness_name, $title_id, $title_name, $create_detail);
		echo json_encode($result);
	}

	public function access_req()
	{
		$id = $this->security->xss_clean($this->input->post('id'));

		$result = $this->modelRequest->access_req($id);
		echo json_encode($result);
	}
	public function access_cancel()
	{
		$id = $this->security->xss_clean($this->input->post('id'));

		$result = $this->modelRequest->access_cancel($id);
		echo json_encode($result);
	}
	public function delete_req()
	{
		$id = $this->security->xss_clean($this->input->post('id'));

		$result = $this->modelRequest->delete_req($id,);
		echo json_encode($result);
	}
}
