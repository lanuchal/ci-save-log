<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->data['nav_uri'] = $this->uri->uri_string();
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
            $this->load->view($body_view);
        }
        $this->load->view('common/auth/end');
    }
}
