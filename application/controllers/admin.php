<?php

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->userdata('username')=="") die('Forbidden Access');
    }

    function index() {
        $data['title'] = 'Admin Config';
        $data['mid_content'] = 'content/admin/admin_config';
        $this->load->model('employee');
        $data['employees'] = $this->employee->get_all_emp();

        $this->load->model('admin_config');
        $data['config'] = $this->admin_config->load_config_data();
        $data['app_config'] = $this->admin_config->load_app_config();

        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $this->load->view('includes/home_template', $data);
    }

    /*
     * Function untuk menyimpan update dari config
     */

    function upd_config() {

        $this->form_validation->set_rules('emp_start', 'Employee Start Number', 'trim|required|min_length[1]|max_length[11]|numeric');
        $this->form_validation->set_rules('sppd_start', 'SPPD Start Number', 'trim|required|min_length[1]|max_length[11]|numeric');
        $this->form_validation->set_rules('job_start', 'Job Start Number', 'trim|required|min_length[1]|max_length[11]|numeric');

        if ($this->form_validation->run() != FALSE) {
            $this->load->model('admin_config');
            $q = $this->admin_config->upd_config_data();

            if ($q) {
                redirect("admin");
            }
        }
        else {
            $this->index();
        }
    }
    function absensi_config(){}
    function fiatur_config() {
        $data['title'] = 'Fiatur Config';
        $data['mid_content'] = 'content/admin/config_fiatur';
        $this->load->model('employee');
        $data['employees'] = $this->employee->get_all_emp();

        $this->load->model('admin_config');
        $this->load->model('organization');
        $data['app_config'] = $this->admin_config->load_app_config();
        $data['org'] = $this->organization->get_all_org();

        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $this->load->view('includes/home_template', $data);
    }

    function update_basic() {
        $this->form_validation->set_rules('app_title', 'Application Title', 'trim|required');
        $this->form_validation->set_rules('tech_support', 'Technical Support', 'trim|required|valid_email');

        if ($this->form_validation->run() != FALSE) {
            $this->load->model('admin_config');

            $q = $this->admin_config->do_upload();
            if ($q) {
                redirect('/admin');
            }
        } else {
            $this->index();
        }
    }

}
