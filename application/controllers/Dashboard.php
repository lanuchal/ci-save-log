<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
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
	public function index()
	{


		if (!$this->check_isreq_validated()) {

			$this->data['current_url'] = $this->uri->uri_string();

			$this->loadViewPageAuth(array('pages/auth/auth-login'));
		} else {
			$this->loadView(array('pages/dashboard/dashboard'));
			$json_data = $this->session->userdata('req_permission_set');

			$data = json_decode($json_data);

			foreach ($data as $key => $value) {
				$uri = "";
				if (substr($key, 0, 3) == "req") {
					$uri = "report";
				} elseif (substr($key, 0, 3) == "ser") {
					$uri = "mamage_node";
				} elseif (substr($key, 0, 3) == "tit") {
					$uri = "mamage_title";
				} elseif (substr($key, 0, 3) == "per") {
					$uri = "mamage_permission";
				} elseif (substr($key, 0, 3) == "use") {
					$uri = "mamage_ma_user";
				}

				if ($value == '1') {
					header("Location: " . base_url($uri) . "");
					return;
				}
			}
		}
	}
}
