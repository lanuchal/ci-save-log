<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Title extends MY_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -Model_titile
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
		$this->load->model('dashboards/manage/Model_title', 'ModelTitle');
	}
	public function index()
	{

		if (!$this->check_isreq_validated()) {

			$this->data['current_url'] = $this->uri->uri_string();

			$this->loadViewPageAuth(array('pages/auth/auth-login'));
		} else {
			
            $this->data['row_title_head'] = "จัดการรายการ";
			$this->data['row_title'] = $this->ModelTitle->get_title();

			$this->loadView(array('pages/dashboard/manage/title'));
		}
	}
	public function get_title_id()
	{

		$id = $this->security->xss_clean($this->input->post('id'));
		$result = $this->ModelTitle->get_title_id($id);
		echo json_encode($result);
	}

	public function update_title_id()
	{
		$id = $this->security->xss_clean($this->input->post('id'));
		$name_changed = $this->security->xss_clean($this->input->post('name_changed'));
		$detail_changed = $this->security->xss_clean($this->input->post('detail_changed'));


		$result = $this->ModelTitle->update_title_id($id, $name_changed, $detail_changed);
		echo json_encode($result);
	}
	public function create_title()
	{
		$create_name = $this->security->xss_clean($this->input->post('create_name'));
		$create_detail = $this->security->xss_clean($this->input->post('create_detail'));


		$result = $this->ModelTitle->create_title($create_name, $create_detail);
		echo json_encode($result);
	}

	public function delete_title()
	{
		$id = $this->security->xss_clean($this->input->post('id'));

		$result = $this->ModelTitle->delete_title($id);
		echo json_encode($result);
	}
}
