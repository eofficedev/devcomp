<?php

class Site extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->userdata('username')=="") die('Forbidden Access');
    }

    function index() {

        if ($this->session->userdata('username') != "") {
            $data['title'] = 'Home';
            $this->load->model('employee');
            $this->load->model('job');
            $username = $this->session->userdata('username');
            $data['result'] = $this->employee->get_detail_emp($username);

            $dt = $data['result']->row();
            $data['job'] = $this->job->get_job_data_by_code($dt->job_code)->row();

            $this->load->model('notifications');
            $data['notif'] = $this->notifications->get_notifications($dt->emp_num);
            $data['app_config'] = $this->admin_config->load_app_config();
            
            if($username=="admin"){
                $data['mid_content'] = 'content/home/home_admin';
            }
            else {
                if($username=="reservation"){
                    $data['mid_content'] = 'content/home/home_reservation';
                }
                else {
                    $data['mid_content'] = 'content/home/home';
                }
            }
            
            $this->load->view('includes/home_template', $data);
        } else {
            redirect("/login");
        }
    }

    /*
     * Function untuk menampilkan home milik user Admin
     */

    function admin_index() {
        $data['title'] = 'Home';
        $this->load->model('employee');
        $this->load->model('job');
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);

        $dt = $data['result']->row();
        $data['job'] = $this->job->get_job_data_by_code($dt->job_code)->row();
        $data['app_config'] = $this->admin_config->load_app_config();
        $this->load->model('notifications');
        $data['notif'] = $this->notifications->get_notifications($dt->emp_num);
        $data['mid_content'] = 'content/home/home_admin';
        $this->load->view('includes/home_template', $data);
    }
    
    function admin_dashboard() {
        $data['title'] = 'Home';
        $this->load->model('employee');
        $this->load->model('job');
        $this->load->model('sppds');
        
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $data['total'] = $this->sppds->rekap();
        $data['tahun'] = $this->sppds->get_year_sppd();
        $dt = $data['result']->row();
        $data['job'] = $this->job->get_job_data_by_code($dt->job_code)->row();
        $data['app_config'] = $this->admin_config->load_app_config();
        $this->load->model('notifications');
        $data['notif'] = $this->notifications->get_notifications($dt->emp_num);
        $data['mid_content'] = 'content/home/dashboard_admin';
        $this->load->view('includes/home_template', $data);
    }
    
    function admin_anggaran() {
        $data['title'] = 'Home';
        $this->load->model('employee');
        $this->load->model('job');
        $this->load->model('sppds');
        
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $data['total'] = $this->sppds->rekap();
        $data['tahun'] = $this->sppds->get_year_sppd();
        $dt = $data['result']->row();
        $data['job'] = $this->job->get_job_data_by_code($dt->job_code)->row();
        $data['app_config'] = $this->admin_config->load_app_config();
        $this->load->model('notifications');
        $data['notif'] = $this->notifications->get_notifications($dt->emp_num);
        $data['mid_content'] = 'content/home/admin_anggaran';
        $this->load->view('includes/home_template', $data);
    }
    
    function update_anggaran() {
       $this->form_validation->set_rules('kode_anggaran', 'kode_anggaran', 'trim|required');
        $this->form_validation->set_rules('program', 'Program_name', 'trim|required|valid_email');

        if ($this->form_validation->run() != FALSE) {
            $this->load->model('admin_config');

            $q = $this->admin_config->upload_anggaran();
            if ($q) {
                redirect('/admin');
            }
        } else {
            $this->index();
        }
         
        
    }

    /*
     * Function untuk melakukan redirect dari notification
     */

    function notif_redirect() {
        $get = $this->uri->uri_to_assoc();
        $id = $get['id'];
        $this->load->model('notifications');
        $address = $this->notifications->get_url_address($id);

        redirect($address);
    }

    function home_reservation() {
        $data['title'] = 'Home';
        $this->load->model('employee');
        $this->load->model('job');
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);

        $dt = $data['result']->row();
        $data['job'] = $this->job->get_job_data_by_code($dt->job_code)->row();
        $data['app_config'] = $this->admin_config->load_app_config();
        $this->load->model('notifications');
        $data['notif'] = $this->notifications->get_notifications($dt->emp_num);
        $data['mid_content'] = 'content/home/home_reservation';
        $this->load->view('includes/home_template', $data);
    }

    function admin_dashboard_list_nota_dinas() {
        $data['title'] = 'Home';

        // Load all required database models
        $this->load->model('employee');
        $this->load->model('job');
        $this->load->model("notadinas/nota_informasi_dash","nota",true);
        $this->load->model("notadinas/pemeriksa","pemeriksa",true);
        
        // Set required UI data (top banner information)
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $dt = $data['result']->row();
        $data['job'] = $this->job->get_job_data_by_code($dt->job_code)->row();
        $data['app_config'] = $this->admin_config->load_app_config();

        // Set required UI data for the main view/template
        $this->pemeriksa->set_table("nota_progress_view");
        
        $result = $this->nota->get_values();
        foreach($result as $row){
            $this->pemeriksa->set_where("nota_id = ". $row->nota_id );
            $nota_pemeriksa = $this->pemeriksa->tampil();     
            $row->nota_pemeriksa = json_encode($nota_pemeriksa);
            if($row->nota_number == '') $row->nota_number = '- (Kosong)';
        }
        $data['nota_data'] = $result;

        // Apply the result to the template
        $data['mid_content'] = 'content/home/dashboard_admin_nota_dinas';
        $this->load->view('includes/home_template', $data);        
    }
}
