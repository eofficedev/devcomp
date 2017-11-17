<?php

class Sppd_config extends CI_Controller {

    public function __construct() {
        parent::__construct(); 
        $this->load->model('employee');
            
        if($this->session->userdata('username')=="") die('Forbidden Access');
    }

    function index() {
        $data['title'] = 'SPPD Configuration';
        $data['mid_content'] = 'content/config/sppd_config';
        $this->load->model('employee');
        $data['employees'] = $this->employee->get_all_emp();

        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $emp_num = $data['result']->row()->emp_num;
        
        
        $this->load->model('admin_config');
        $data['flow'] = $this->admin_config->get_list_flow_sppd();
        $data['app_config'] = $this->admin_config->load_app_config();
        
        $data['all_atasan'] = $this->employee->get_all_atasan_admin();
        $data['list_profile'] = $this->employee->load_list_profile($emp_num);
        $this->load->view('includes/home_template', $data);
    }

    /*
     * Function untuk menampilkan pop-up menampilkan list pemeriksa
     */

    function show_exam() {
        $get = $this->uri->uri_to_assoc();
        $id = $get['id'];
        $data['id'] = $id;
        $data['title'] = 'Pilih Pemeriksa';
        $this->load->model('employee');
        $username = $this->session->userdata('username');

        if ($this->input->post('keyword') == null || $this->input->post('keyword') == "") {
            $query = $this->employee->get_detail_emp($username);
            $res = $query->row();
            $mgrId = 0;
            $arrdata = array();
            $data['all_atasan'] = $this->employee->get_all_atasan($mgrId, $arrdata, 0);
        } else {
            $data['all_atasan'] = $this->employee->get_emp_byname($this->input->post('keyword'));
        }

        $this->load->view('content/config/show_all_pemeriksa', $data);
    }

    /*
     * Function untuk menyimpan flow sppd
     */

    function save_flow_sppd() {
        $this->load->model('admin_config');
        $q = $this->admin_config->save_sppd_flow();

        if ($q) {
            redirect("/sppd_config");
        }
    }

    /*
     * Function untuk menghapus pemeriksa dari flow sppd
     */

    function hapus_pemeriksa() {
        $get = $this->uri->uri_to_assoc();
        $id = $get['id'];

        $this->load->model('admin_config');
        $q = $this->admin_config->hapus_pemeriksa($id);

        if ($q) {
            redirect("/sppd_config");
        }
    }

}
