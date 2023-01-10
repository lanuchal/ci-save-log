<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->data['nav_uri'] = $this->uri->uri_string();

        $this->load->library('session');
        $this->session->set_userdata('last_url', $this->uri->uri_string());
    }

    protected function loadView($body_views)
    {
        $this->load->view('common/dashboard/header');
        $this->load->view('common/dashboard/start');
        $this->load->view('common/dashboard/menu', $this->data);
        $this->load->view('common/dashboard/nav');
        foreach ($body_views as $body_view) {
            $this->load->view($body_view);
        }
        $this->load->view('common/dashboard/footer');
        $this->load->view('common/dashboard/end');
    }

    protected function loadViewPageAuth($body_views)
    {
        $this->load->view('common/auth/header');
        foreach ($body_views as $body_view) {
            $this->load->view($body_view, $this->data);
        }
        $this->load->view('common/auth/end');
    }

    protected function check_isreq_validated()
    {
        $chk_login = $this->session->userdata('req_validated');

        if ($chk_login) {
            return 1;
        } else {
            return 0;
        }
    }
}
