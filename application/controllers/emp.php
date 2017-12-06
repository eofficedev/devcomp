<?php

class Emp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username')=="") {
            die('Forbidden Access');
        }
        $this->load->helper("class");
        load_ci_class(APPPATH . 'services/Employee_service');
        load_ci_class(APPPATH . 'services/Organization_service');
        load_ci_class(APPPATH . 'services/Job_service');
    }

    public function index($id = null)
    {
        $data['title'] = 'List Employees Data';
        $data['mid_content'] = 'content/employee/list_employee';
        $this->load->model('employee');
        
//        $config['base_url'] = base_url() . 'index.php/emp';
//        $config['first_page'] = 'Awal';
//        $config['last_page'] = 'Akhir';
//        $config['total_rows'] = $this->employee->get_total_emp();
//        $config['per_page'] = 7;
//        $config['num_links'] = 4;
//        $this->pagination->initialize($config);
        
        // $data['employees'] = $this->employee->get_all_emp();
        $data['employees'] = $this->employee_service->get_all_emp('','');
        $username = $this->session->userdata('username');
        // $data['result'] = $this->employee->get_detail_emp($username);
        $data['result'] = $this->employee->get_detail_emp($username);
        $data['app_config'] = $this->admin_config->load_app_config();
        $this->load->view('includes/home_template', $data);
    }

    public function add_emp()
    {
        $res = $this->get_session();
        $data['result'] = $res['result'];
        // $this->load->model("absensi/database", "pegawai", true);
        // $this->pegawai->set_table("hrms_employees");
        // $this->pegawai->set_table("hrms_employees");
        $emp = $this->employee_service->get_all_emp('','');
        // $data["countEmployee"] = $this->pegawai->count();
        $data["countEmployee"] = count($emp);
        
        // $this->load->model('job');
        // $data['jobs'] = $this->job->get_all_job();
        // $data['job_curr'] = $this->job->load_curr_num();
        $job = $this->job_service->get_all_job('', '');
        var_dump($job);
        $data['jobs'] = $job;
        $data['job_curr'] = 0; //$this->job->load_curr_num();

        // $this->load->model('employee');
        $data['emp_curr_num'] = 0; //$this->employee->load_curr_num();

        // $this->load->model('organization');
        // $data['org'] = $this->organization->get_all_org();
        $data['org'] = $this->organization_service->get_all_org('','');

        $data['title'] = 'Add New Employee';
        $data['mid_content'] = 'content/employee/add_employee';
        $data['app_config'] = $this->admin_config->load_app_config();
        $this->load->view('includes/home_template', $data);
    }

    public function get_session()
    {
        $this->load->model('employee');
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);

        return $data;
    }
    public function process_add()
    {
        $this->form_validation->set_rules('emp_firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('emp_lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('emp_dob', 'Birth Date', 'trim|required');
        $this->form_validation->set_rules('emp_street', 'Street Address', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('emp_email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('emp_org', 'Organization', 'trim|required');
        $this->form_validation->set_rules('emp_job', 'Job', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('email_password', 'Email Password', 'required');
        $this->form_validation->set_rules('email_username', 'Email Username', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');


        if ($this->form_validation->run() != false) {
            // $this->load->model('employee');
            // $q = $this->employee->add_employee();

            $emp_model = array(
                "emp_id" => $this->input->post('emp_id'),
                "emp_firstname" => $this->input->post('emp_firstname'),
                "emp_lastname" => $this->input->post('emp_lastname'),
                "emp_gender" => $this->input->post('gender'),
                "emp_dob" => $this->input->post("emp_dob"),
                "emp_street" => $this->input->post("emp_street"),
                "emp_email" => $this->input->post("emp_email"),
                "emp_cutah" => "10", // should retrieve from configuration
                "emp_trip" => "10", // should retrieve from configuration
                "emp_cubes" => "10", // should retrieve from configuration
                // "org_code" => $this->input->post('org_code'),
                // "org_id" => $this->input->post("emp_org"),
                "emp_job" => $this->input->post('emp_job'),
                "job_code" => $this->input->post('job_code'),
                // "org_code" => $this->input->post('org_code'),
                "emp_username" => $this->input->post('email_username'),
                "emp_password" => $this->input->post('email_password')
            );
    
            $q = $this->employee_service->add_employee($emp_model);
            var_dump($q); return;

            if ($q) {
                redirect('emp');
            } else {
                redirect('emp/add_emp');
            }
        } else {
            $this->add_emp();
        }
    }

    public function view()
    {
        $get = $this->uri->uri_to_assoc();
        // $this->load->model('employee');
        $data['res'] = $get['id'];

        // $this->load->model('job');
        // $data['jobs'] = $this->job->get_all_job();
        $data['jobs'] = $this->job_service->get_all_job('', '');

        // $this->load->model('organization');
        // $data['org'] = $this->organization->get_all_org();
        $data['org'] = $this->organization_service->get_all_org('','');
        // $data['employee_data'] = $this->employee->get_emp_data($data['res']);
        $emp_data = $this->employee_service->get_emp_data($data['res']);
        if(count($emp_data) > 0) $data['employee_data'] = $emp_data[0];
        else $data['employee_data'] = $emp_data;
        // $data['telp'] = $this->employee->get_employee_telp($data['res']);
        
        $data['title'] = 'Employee Profile';
        $data['mid_content'] = 'content/employee/update_employee';
        $res = $this->get_session();

        // $data['user_data'] = $this->employee->get_user_data($data['res']);
        $user_data = $this->employee_service->get_user_data($data['res']);
        if(count($user_data) > 0) $data['user_data'] = $user_data[0];
        else $data['user_data'] = $user_data;
        // $orgid = $data['employee_data']->row()->org_id;
        $orgid = 0; //$data['employee_data']->org_id;

        //$data['job'] = $this->job->load_job_by_org($orgid);
        $data['job'] = $this->job_service->get_byorgnum_job($orgid);

        $data['result'] = $res['result'];
        $data['app_config'] = $this->admin_config->load_app_config();
        $this->load->view('includes/home_template', $data);
    }

    public function process_update()
    {
        $num = $this->input->post('emp_num');
        $this->form_validation->set_rules('emp_firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('emp_lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('emp_dob', 'Birth Date', 'trim|required');
        $this->form_validation->set_rules('emp_street', 'Street Address', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('emp_email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('emp_org', 'Organization', 'trim|required');
        $this->form_validation->set_rules('emp_job', 'Job', 'trim|required');
        if ($this->input->post('password') != "") {
            $this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]|max_length[12]');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|matches[password]');
        }
        if ($this->form_validation->run() != false) {
            // $this->load->model('employee');
            // $q = $this->employee->update_emp();

            $emp_model = array(
                "emp_num" => $this->input->post('emp_num'),
                "emp_id" => $this->input->post('emp_id'),
                "emp_firstname" => $this->input->post('emp_firstname'),
                "emp_lastname" => $this->input->post('emp_lastname'),
                "emp_gender" => $this->input->post('gender'),
                "emp_dob" => $this->input->post("emp_dob"),
                "emp_street" => $this->input->post("emp_street"),
                "emp_username" => $this->input->post("email_username"),
                "emp_password" => $this->input->post("email_password"),
                "emp_cutah" => "10",
                "emp_trip" => "10",
                "emp_cubes" => "10",
                "emp_email" => $this->input->post("emp_email"),
                "emp_job" => $this->input->post("emp_job"),
                // "job_code" => $job_code,
                // "org_code" => $org_code,
                // "org_id" => $this->input->post("emp_org")
            );

            $q = $this->employee_service->update_employee($emp_model);

            // return;

            if ($q) {
                redirect('/emp');
            } else {
                redirect('/emp');
            }
        } else {
            $this->load->model('employee');
            $data['res'] = $this->input->post('emp_num');

            // $this->load->model('job');
            // $data['jobs'] = $this->job->get_all_job();
            $data['jobs'] = $this->job_service->get_all_job('', '');

            // $this->load->model('organization');
            // $data['org'] = $this->organization->get_all_org();
            $data['org'] = $this->organization_service->get_all_org('','');
            // $data['employee_data'] = $this->employee->get_emp_data($data['res']);
            $emp_data = $this->employee_service->get_emp_data($data['res']);
            if(count($emp_data) > 0) $data['employee_data'] = $emp_data[0];
            else $data['employee_data'] = $emp_data;
            // $data['telp'] = $this->employee->get_employee_telp($data['res']);

            $data['title'] = 'Employee Profile';
            $data['mid_content'] = 'content/employee/update_employee';
            $res = $this->get_session();

            // $data['user_data'] = $this->employee->get_user_data($data['res']);
            $user_data = $this->employee_service->get_user_data($data['res']);
            if(count($user_data) > 0) $data['user_data'] = $user_data[0];
            else $data['user_data'] = $user_data;
            $orgid = 0; //$data['employee_data']->row()->org_id;

            // $data['job'] = $this->job->load_job_by_org($orgid);
            $data['job'] = $this->job_service->get_byorgnum_job($orgid);

            $data['result'] = $res['result'];
            $data['app_config'] = $this->admin_config->load_app_config();
            $this->load->view('includes/home_template', $data);
        }
    }

    public function filter_emp()
    {
        $data['title'] = 'List Employees Data';
        $data['mid_content'] = 'content/employee/list_employee';
        $this->load->model('employee');
        $data['employees'] = $this->employee->get_filter_employee();
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $data['app_config'] = $this->admin_config->load_app_config();
        $this->load->view('includes/home_template', $data);
    }

    public function load_emp_per_org()
    {
        $this->load->model('employee');
        $q = $this->employee->load_emp_by_org();
        echo $q;
    }
    
    public function get_jabatan_by_keyword()
    {
        $this->load->model('employee');
        $q = $this->employee->get_jabatan_by_keyword();
        
        echo $q;
    }
    
    public function get_employee_by_name()
    {
        $this->load->model('employee');
        $q = $this->employee->get_employee_by_name();
        
        echo $q;
    }
    
    public function load_detail_profile()
    {
        $profid = $this->input->post('prof');
        $this->load->model('employee');
        $q = $this->employee->load_detail_profile($profid);
        
        echo $q;
    }
    
    public function del_profile()
    {
        $this->load->model('employee');
        $q = $this->employee->del_profile();
        
        return $q;
    }
    
    public function hapus_emp($empnum)
    {
        // $this->load->model('employee');
        // $q = $this->employee->del_emp($empnum);

        $param = array(
            'emp_num'=> $empnum,
        );

        $q = $this->employee_service->delete_employee($param);
        
        if ($q) {
            redirect("emp");
        }
    }
}
