<?php

class Jobs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == "") {
            die('Forbidden Access');
        }
        $this->load->helper("class");
        load_ci_class(APPPATH . 'services/Organization_service');
        load_ci_class(APPPATH . 'services/Job_service');
    }

    public function index()
    {
        $this->load->model('employee');
        $this->load->model('job');
        $username = $this->session->userdata('username');

        $this->load->model('organization');
        // $data['job'] = $this->job->get_all_job();
        // $data['list_org'] = $this->organization->get_all_org();
        $data['job'] = $this->job_service->get_all_job($this->input->post('filter'), $this->input->post('keyword'));
        $data['list_org'] = $this->organization_service->get_all_org(null, null);

        $data['result'] = $this->employee->get_detail_emp($username);
        $data['app_config'] = $this->admin_config->load_app_config();
        $data['title'] = 'Jobs';

        $data['mid_content'] = 'content/job/list_job';
        $this->load->view('includes/home_template', $data);
    }

    /*
     * Untuk menampilkan form untuk add job baru
     */

    public function form_job()
    {
        $res = $this->get_session();
        $data['result'] = $res['result'];
        $data['title'] = 'Add Job';
        // $this->load->model('organization');
        // $this->load->model('job');
        // $data['job_curr_num'] = $this->job->load_curr_num();
        // $data['org'] = $this->organization->get_all_org();
        $data['org'] =  $this->organization_service->get_all_org(null, null);
        $data['app_config'] = $this->admin_config->load_app_config();
        $data['mid_content'] = 'content/job/add_job';
        $this->load->view('includes/home_template', $data);
    }

    /*
     * untuk memperoleh username dari session yang sedang aktif
     */

    public function get_session()
    {
        $this->load->model('employee');
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);

        return $data;
    }

    /*
     * Untuk memproses add job
     */
    public function cekJobId($id)
    {
        $this->load->model('notadinas/database', "jobnya", true);
        $this->jobnya->set_table("hrms_job");
        $this->jobnya->set_order("job_num desc");
        $where["job_id"]=$id;
        $this->jobnya->set_where($where);
        $jobDet = $this->jobnya->tampil();
        if (count($jobDet)>0) {
            $this->form_validation->set_message('cekJobId', 'The %s is already exsist');
            return false;
        } else {
            return true;
        }
    }
    public function process_add()
    {
        $this->form_validation->set_rules('job_name', 'Job Name', 'trim|required');
        $this->form_validation->set_rules('job_id', 'Job Name', 'trim|required|callback_cekJobId');
        $this->form_validation->set_rules('job_code', 'Job Code', 'trim|required');
        $this->form_validation->set_rules('job_description', 'Job Description', 'trim|required');
        $this->form_validation->set_rules('organization', 'Organization', 'trim|required');

        if ($this->form_validation->run() != false) {
            // $this->load->model('job');
            // $q = $this->job->add_job();

            $job_model = array(
                'job_id' => $this->input->post('job_id'),
                'job_name' => $this->input->post('job_name'),
                'job_description' => $this->input->post('job_description'),
                'job_code' => $this->input->post('job_code'),
                'org_num' => $this->input->post('organization')
            );

            $q = $this->job_service->add_job($job_model);

            if ($q) {
                redirect('/jobs');
            }
        } else {
            $this->form_job();
        }
    }

    public function process_add_ajax()
    {
        $this->load->model('job');
        $q = $this->job->add_job_ajax();

        if ($q != "") {
            echo "<option value='" . $q . "'>" . $this->input->post('job_name') . "</option>;" . $q;
        }
    }

    /*
     * Function untuk memproses update job
     */

    public function upd()
    {
        $get = $this->uri->uri_to_assoc();
        $data['id'] = $get['id'];
        $this->load->model('job');
        //$data['job_data'] = $this->job->get_job_data($data['id']);
        $data['job_data'] = $this->job_service->get_byid_job($data['id']);
        
        $res = $this->get_session();
        $data['result'] = $res['result'];
        $this->load->model('organization');
        //$data['org'] = $this->organization->get_all_org();
        $data['org'] = $this->organization_service->get_all_org(null, null);
        $data['title'] = 'Update Job';
        $data['mid_content'] = 'content/job/update_job';
        $data['app_config'] = $this->admin_config->load_app_config();
        $this->load->view('includes/home_template', $data);
    }

    /*
     * Function untuk mengupdate perubahan dari data job
     */
    public function process_update()
    {
        $this->form_validation->set_rules('job_name', 'Job Name', 'trim|required');
        $this->form_validation->set_rules('job_code', 'Job Code', 'trim|required');
        $this->form_validation->set_rules('job_description', 'Job Description', 'trim|required');
        $this->form_validation->set_rules('org', 'Organization', 'trim|required');

        if ($this->form_validation->run() != false) {
            // $this->load->model('job');
            // $q = $this->job->upd_job();

            $job_model = array(
                'job_num' => $this->input->post('job_num'),
                'job_id' => $this->input->post('job_id'),
                'job_name' => $this->input->post('job_name'),
                'job_description' => $this->input->post('job_description'),
                'job_code' => $this->input->post('job_code'),
                'org_num' => $this->input->post('organization')
            );

            $q = $this->job_service->upd_job($job_model);

            // var_dump($job_model);
            // var_dump($q);
            // return;

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

    public function load_job()
    {
        $this->load->model('job');
        $q = $this->job->list_job_by_org();
        echo $q;
    }

    /*
     * Function untuk menampilkan manager dari setiap job
     */

    public function load_mgr()
    {
        $this->load->model('job');
        $q = $this->job->get_mgr_detail();
        echo $q;
    }

    public function pilih_employee()
    {
        $get = $this->uri->uri_to_assoc();
        $id = $get['id'];
        $this->load->model('employee');

        $data['employee'] = $this->employee->load_emp_by_org($id);
        $username = $this->session->userdata('username');
        $data['title'] = 'Pilih Employee';
        $this->load->view('content/job/pilih_employee', $data);
    }

    public function get_web_page()
    {
        $this->load->model('reservation_model');
        $q = (array) $this->reservation_model->get_web_page();

        foreach ($q['pointer'] as $key => $value) {
            echo $value->name . '<br/>';
        }
    }

    public function get_web_page_2()
    {
        $this->load->model('reservation_model');
        $q = (array) $this->reservation_model->get_web_page_2();

        foreach ($q['airlines'] as $key => $value) {
            echo $value->code . " " . $value->name . " " . $value->label . '<br/>';
        }
    }

    public function hapus_job($jobid)
    {
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
