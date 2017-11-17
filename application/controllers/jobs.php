<?php

class Jobs extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('username') == "")
            die('Forbidden Access');
    }

    function index() {
        $this->load->model('employee');
        $this->load->model('job');
        $username = $this->session->userdata('username');

        $this->load->model('organization');
        $data['job'] = $this->job->get_all_job();
        $data['list_org'] = $this->organization->get_all_org();

        $data['result'] = $this->employee->get_detail_emp($username);
        $data['app_config'] = $this->admin_config->load_app_config();
        $data['title'] = 'Jobs';

        $data['mid_content'] = 'content/job/list_job';
        $this->load->view('includes/home_template', $data);
    }

    /*
     * Untuk menampilkan form untuk add job baru
     */

    function form_job() {
        $res = $this->get_session();
        $data['result'] = $res['result'];
        $data['title'] = 'Add Job';
        $this->load->model('organization');

        $this->load->model('job');
        $data['job_curr_num'] = $this->job->load_curr_num();

        $data['org'] = $this->organization->get_all_org();
        $data['app_config'] = $this->admin_config->load_app_config();
        $data['mid_content'] = 'content/job/add_job';
        $this->load->view('includes/home_template', $data);
    }

    /*
     * untuk memperoleh username dari session yang sedang aktif
     */

    function get_session() {
        $this->load->model('employee');
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);

        return $data;
    }

    /*
     * Untuk memproses add job
     */
 function cekJobId($id){
        $this->load->model('notadinas/database',"jobnya",true);
        $this->jobnya->set_table("hrms_job");
        $this->jobnya->set_order("job_num desc");
        $where["job_id"]=$id;
        $this->jobnya->set_where($where);
        $jobDet = $this->jobnya->tampil();
        if(count($jobDet)>0){
            $this->form_validation->set_message('cekJobId', 'The %s is already exsist');
            return FALSE;
        }
        else
            return TRUE;
    }
    function process_add() {

        $this->form_validation->set_rules('job_name', 'Job Name', 'trim|required');
        $this->form_validation->set_rules('job_id', 'Job Name', 'trim|required|callback_cekJobId');
        $this->form_validation->set_rules('job_code', 'Job Code', 'trim|required');
        $this->form_validation->set_rules('job_description', 'Job Description', 'trim|required');
        $this->form_validation->set_rules('organization', 'Organization', 'trim|required');

        if ($this->form_validation->run() != FALSE) {
            $this->load->model('job');
            $q = $this->job->add_job();

            if ($q) {
                redirect('/jobs');
            }
        } else {
            $this->form_job();
        }
    }

    function process_add_ajax() {
        $this->load->model('job');
        $q = $this->job->add_job_ajax();

        if ($q != "") {
            echo "<option value='" . $q . "'>" . $this->input->post('job_name') . "</option>;" . $q;
        }
    }

    /*
     * Function untuk memproses update job
     */

    function upd() {
        $get = $this->uri->uri_to_assoc();
        $data['id'] = $get['id'];
        $this->load->model('job');
        $data['job_data'] = $this->job->get_job_data($data['id']);

        $res = $this->get_session();
        $data['result'] = $res['result'];
        $this->load->model('organization');
        $data['org'] = $this->organization->get_all_org();
        $data['title'] = 'Update Job';
        $data['mid_content'] = 'content/job/update_job';
        $data['app_config'] = $this->admin_config->load_app_config();
        $this->load->view('includes/home_template', $data);
    }

    /*
     * Function untuk mengupdate perubahan dari data job
     */

    function process_update() {

        $this->form_validation->set_rules('job_name', 'Job Name', 'trim|required');
        $this->form_validation->set_rules('job_code', 'Job Code', 'trim|required');
        $this->form_validation->set_rules('job_description', 'Job Description', 'trim|required');
        $this->form_validation->set_rules('org', 'Organization', 'trim|required');

        if ($this->form_validation->run() != FALSE) {
            $this->load->model('job');
            $q = $this->job->upd_job();

            if ($q) {
                redirect('/jobs');
            }
        } else {
            $data['id'] = $this->input->post('job_num');
            $this->load->model('job');
            $data['job_data'] = $this->job->get_job_data($data['id']);

            $res = $this->get_session();
            $data['result'] = $res['result'];
            $this->load->model('organization');
            $data['org'] = $this->organization->get_all_org();
            $data['title'] = 'Update Job';
            $data['mid_content'] = 'content/job/update_job';
            $data['app_config'] = $this->admin_config->load_app_config();
            $this->load->view('includes/home_template', $data);
        }
    }

    /*
     * Function untuk menampilkan list job berdasarkan organisasi masing-masing
     */

    function load_job() {
        $this->load->model('job');
        $q = $this->job->list_job_by_org();
        echo $q;
    }

    /*
     * Function untuk menampilkan manager dari setiap job
     */

    function load_mgr() {
        $this->load->model('job');
        $q = $this->job->get_mgr_detail();
        echo $q;
    }

    function pilih_employee() {
        $get = $this->uri->uri_to_assoc();
        $id = $get['id'];
        $this->load->model('employee');

        $data['employee'] = $this->employee->load_emp_by_org($id);
        $username = $this->session->userdata('username');
        $data['title'] = 'Pilih Employee';
        $this->load->view('content/job/pilih_employee', $data);
    }

    function get_web_page() {
        $this->load->model('reservation_model');
        $q = (array) $this->reservation_model->get_web_page();

        foreach ($q['pointer'] as $key => $value) {
            echo $value->name . '<br/>';
        }
    }

    function get_web_page_2() {
        $this->load->model('reservation_model');
        $q = (array) $this->reservation_model->get_web_page_2();

        foreach ($q['airlines'] as $key => $value) {
            echo $value->code . " " . $value->name . " " . $value->label . '<br/>';
        }
    }

    function hapus_job($jobid) {
        $this->load->model('job');
        $q = $this->job->delete_job($jobid);
        if ($q) {
            $this->load->model('employee');
            $this->load->model('job');
            $username = $this->session->userdata('username');

            $this->load->model('organization');
            $data['job'] = $this->job->get_all_job();
            $data['list_org'] = $this->organization->get_all_org();
            $data['status'] = "Jabatan berhasil dihapus";
            $data['result'] = $this->employee->get_detail_emp($username);
            $data['app_config'] = $this->admin_config->load_app_config();
            $data['title'] = 'Jobs';

            $data['mid_content'] = 'content/job/list_job';
            $this->load->view('includes/home_template', $data);
        }
    }

}
