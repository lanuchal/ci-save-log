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
}
