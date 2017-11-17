<?php

class Utilities extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->userdata('username')=="") die('Forbidden Access');
    }

    /*
     * Menampilkan form untuk mengganti password
     */

    function change_password_view() {
        $data['title'] = "Change Password";
        $data['mid_content'] = 'content/utilities/change_password';
        $this->load->model('employee');
        $data['employees'] = $this->employee->get_all_emp();
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $data['app_config'] = $this->admin_config->load_app_config();
        $this->load->view('includes/home_template', $data);
    }

    /*
     * Function untuk memproses pergantian password user
     */

    function process_change_password() {
        $this->form_validation->set_rules('old', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('new', 'New Password', 'trim|required');
        $this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|required|matches[new]');


        if ($this->form_validation->run() != FALSE) {
            $this->load->model('utility_model');
            $query = $this->utility_model->process_change_password();

            if ($query) {
                if ($this->session->userdata('username') == 'admin') {
                    redirect('/site/admin_index');
                } else {
                    redirect('/site');
                }
            } else {
                redirect('/utilities/change_password_view');
            }
        } else {
            $this->change_password_view();
        }
    }

    /*
     * Function untuk menampilkan halaman help
     */

    function help_view() {
        $data['title'] = "Help";
        $data['mid_content'] = 'content/utilities/help';
        $this->load->model('employee');
        $data['employees'] = $this->employee->get_all_emp();
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $data['app_config'] = $this->admin_config->load_app_config();
        $this->load->view('includes/home_template', $data);
    }

    /*
     * Function untuk menampilkan form untuk edit profile
     */

    function edit_profile_view() {
        $data['title'] = "Edit Profile";
        $data['mid_content'] = 'content/utilities/edit_profile';
        $this->load->model('employee');
        $data['employees'] = $this->employee->get_all_emp("","");
        $data['employee_data'] = $this->employee->get_employee_data_by_username();
        
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $res = $data['result']->row()->emp_num;
        $data['emp_telp'] = $this->employee->get_employee_telp($res);
        $data['app_config'] = $this->admin_config->load_app_config();
        $this->load->view('includes/home_template', $data);
    }

    /*
     * Function untuk mem-process edit profile
     */

    function process_edit_profile() {

        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('dob', 'Date Of Birth', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() != FALSE) {
            $this->load->model('utility_model');
            $q = $this->utility_model->process_edit_profile();

            if ($q) {
                redirect('/site');
            } else {
                redirect('/utilities/edit_profile_view');
            }
            echo $q;
        }
        else {
            $this->edit_profile_view();
        }
    }

}