<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
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
        $this->load->model('auth/Model_auth', 'modelAuth');
        $this->load->model('Model_table_id', 'modelTableId');
    }

    public function index()
    {
        if (!$this->check_isreq_validated()) {
            $this->data['current_url'] = $this->uri->uri_string();
            $this->loadViewPageAuth(array('pages/auth/auth-login'));
        } else {
            header("Location: " . base_url('dashboard') . "");
        }
    }


    public function sign_in()
    {
        $username = strval($this->security->xss_clean($this->input->post('username')));
        $password = strval($this->security->xss_clean($this->input->post('password')));
        $last_path = strval($this->security->xss_clean($this->input->post('last_path')));

        $num_ot  = sizeof($this->modelTableId->get_table_id('tb_nuser', 'NUM_OT', $username));


        $result = (!$num_ot) ?
            array("status" => '0', "num_ot" => $num_ot) :
            // array("status" => '1', "last_path" => $last_path, "data" => strval($this->modelAuth->validate($username, $password)));
            array("status" => '1', "username" => $username, "password" => $password, "last_path" => $last_path, "data" => json_encode($this->modelAuth->validate($username, $password)));
        echo json_encode($result);



        // $username = $this->security->xss_clean($this->input->post('username'));
        // $password = $this->security->xss_clean($this->input->post('password'));
        // $last_path = $this->security->xss_clean($this->input->post('last_path'));

        // $result = $this->modelAuth->validate($username, $password);

        // if ($result) {
        //     header("Location: " . base_url($last_path) . "");
        // } else {
        //     $this->data['current_url'] = $last_path;
        //     $this->loadViewPageAuth(array('pages/auth/auth-login'));
        // }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        header("Location: " . base_url('auth_login') . "");
    }
}
