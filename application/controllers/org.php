<?php

class Org extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == "") {
            die('Forbidden Access');
        }
        $this->load->helper("kode");
        $this->load->helper("class");
        load_ci_class(APPPATH . 'services/Organization_service');
    }

    public function index()
    {
        $this->data['title'] = 'List Organization';
        $this->data['result'] = $this->get_session();
        $this->data['app_config'] = $this->admin_config->load_app_config();

        $this->load->model('organization');
        // $org = $this->organization->get_all_org();
        // $this->data['org'] = $org;

        $test = $this->organization_service->get_all_org($this->input->post('filter'), $this->input->post('keyword'));
        $this->data['org'] = $test;
        // var_dump($org);
        // var_dump($test);
        $this->data['mid_content'] = 'content/organization/list_org';
        $this->load->view('includes/home_template', $this->data);
    }

    public function get_session()
    {
        $this->load->model('employee');
        $username = $this->session->userdata('username');
        $this->data['result'] = $this->employee->get_detail_emp($username);
        return $this->data['result'];
    }

    public function add_org()
    {
        $this->data['title'] = 'Add Organization';
        $this->data['result'] = $this->get_session();
        $this->data['app_config'] = $this->admin_config->load_app_config();
        $this->load->model('organization');
        $this->load->model('job');
        //   $this->data['curr_num'] = $this->organization->load_curr_num();
        //  $this->data['job_curr'] = $this->job->load_curr_num();
        $this->data['org'] = $this->organization->get_all_org_name();

        $this->data['mid_content'] = 'content/organization/add_org';
        $this->load->view('includes/home_template', $this->data);
    }
    public function cekOrgId($str)
    {
        $this->load->model('notadinas/database', "organisasi", true);
        $this->organisasi->set_table("hrms_organization");
        $this->organisasi->set_order("org_num desc");
        $where["org_id"]=$str;
        $this->organisasi->set_where($where);
        $orgDet = $this->organisasi->tampil();
        if (count($orgDet)>0) {
            $this->form_validation->set_message('cekOrgId', 'The %s is already exsist');

            return false;
        } else {
            return true;
        }
    }
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

    public function add_organization()
    {
        $this->form_validation->set_rules("org_name", "Organization Name", "trim|required");
        $this->form_validation->set_rules("org_code", "Organization Code", "trim|required");
        $this->form_validation->set_rules("org_address", "Address", "trim|required");
        $this->form_validation->set_rules("org_work_telp", "Telp", "trim|required");
        $this->form_validation->set_rules("org_fax", "Fax", "trim|required");
        $this->form_validation->set_rules("org_id", "Organization ID", "callback_cekOrgId|required");
        $this->form_validation->set_rules("org_email", "Fax", "trim|required|valid_email");
        $this->form_validation->set_rules("org_postal_code", "Postal Code", "trim|required");

        $this->load->model("notadinas/database", "jobnya", true);
        $this->jobnya->set_table("hrms_job");
        $this->jobnya->set_order("job_num asc");
        $where = array();
        $where["job_id"] = $this->input->post("job_id");
        $this->jobnya->set_where($where);
        if (count($this->jobnya->tampil())>0 and $this->input->post("konfia")!="Buat sendiri") {
        } else {
            $this->form_validation->set_rules("job_name", "Nama Jabatan", "trim|required");
            $this->form_validation->set_rules("job_code", "Kode Jabatan", "trim|required|min_length[3]|max_length[5]");
            $this->form_validation->set_rules("job_description", "Deskripsi Jabatan", "trim|required");
            $this->form_validation->set_rules("job_id", "Jabatan ID", "callback_cekJobId|required");
        }
        $this->load->model("notadinas/database", "jobnya", true);
        $this->jobnya->set_table("hrms_job");
        $this->jobnya->set_order("job_num asc");
        $where = array();
        $where["job_id"] = $this->input->post("job_id_hr");
        $this->jobnya->set_where($where);
        if (count($this->jobnya->tampil())>0 and $this->input->post("konhr")!="Buat sendiri") {
        } else {
            $this->form_validation->set_rules("job_name_hr", "Nama Jabatan", "trim|required");
            $this->form_validation->set_rules("job_code_hr", "Kode Jabatan", "trim|required|min_length[2]|max_length[5]");
            $this->form_validation->set_rules("job_description_hr", "Deskripsi Jabatan", "trim|required");
            $this->form_validation->set_rules("job_id_hr", "Jabatan ID", "callback_cekJobId|required");
        }
        $this->form_validation->set_rules("job_name_kepala", "Nama Jabatan", "trim|required");
        $this->form_validation->set_rules("job_code_kepala", "Kode Jabatan", "trim|required|min_length[2]|max_length[5]");
        $this->form_validation->set_rules("job_description_kepala", "Deskripsi Jabatan", "trim|required");
        $this->form_validation->set_rules("job_id_kepala", "Jabatan ID", "callback_cekJobId|required");
        if ($this->form_validation->run() != false) {
            $this->load->model('organization');
            $q = $this->organization->add_org();
            if ($q) {
                $where = array();
                $where["org_id"]=$this->input->post('org_id');
                $this->load->model("notadinas/database", "organisasinya", true);
                $this->organisasinya->set_table("hrms_organization");
                $this->organisasinya->set_order("org_id asc");
                $this->organisasinya->set_where($where);
                $organisasinya=$this->organisasinya->tampil();
                if ($this->input->post("konhr")=="Buat sendiri") {
                    $val["org_num"]=$organisasinya[0]->org_num;
                    $this->data['status'] = "Organisasi Berhasil Ditambah";
                    $where = array();
                    $val["job_id"] = $this->input->post("job_id_hr");
                    $val["job_name"] = $this->input->post("job_name_hr");
                    $val["job_code"] = $this->input->post("job_code_hr");
                    $val["job_description"] = $this->input->post("job_description_hr");
                    $this->jobnya->values = $val;
                    $this->jobnya->simpan();
                }
                $where = array();
                $where["job_id"]=$this->input->post("job_id_hr");
                $this->jobnya->set_where($where);
                $jobnya = $this->jobnya->tampil()[0];
                $where=array();
                $val=array();

                $valu["hr_job_num"]=$jobnya->job_num;
                
                $val["job_id"] = $this->input->post("job_id_kepala");
                $val["job_name"] = $this->input->post("job_name_kepala");
                $val["job_code"] = $this->input->post("job_code_kepala");
                $val["job_description"] = $this->input->post("job_description_kepala");
                $val["org_num"]=$organisasinya[0]->org_num;
                $this->jobnya->values = $val;
                $this->jobnya->simpan();

                $where["job_id"]=$this->input->post("job_id_kepala");
                $this->jobnya->set_where($where);
                $jobnya = $this->jobnya->tampil()[0];
                $valu["kepala_job_num"]=$jobnya->job_num;
                
                $this->organisasinya->values=$valu;
                $this->organisasinya->update();
                redirect('/org');
            }
        } else {
            $this->add_org();
        }
    }

    public function view($pg="id", $id)
    {
        $this->load->model('organization');
        // $this->data['org'] = $this->organization->get_detail_org($id);
        $this->data['org'] = $this->organization_service->get_byid_org($id)[0];
        //$dt = $this->data['org']->row()->org_num;
        $dt = $this->data['org']->org_num;
        $this->data['all_org'] = $this->organization->get_all_org_name($dt);
        $this->data['title'] = 'List Organization';
        $this->data['result'] = $this->get_session();
        $this->data['app_config'] = $this->admin_config->load_app_config();
        // $where["fiatur_job_num"] = $this->data["org"]->row()->job_num;
        ;
        $this->load->model("notadinas/database", "organisasi", true);
        $this->organisasi->set_table("hrms_organization");
        $this->organisasi->set_order("org_num asc");
        // $this->organisasi->set_where($where);
        $fia = $this->organisasi->tampil();
        $where=array();
        // $where["hr_job_num"]=$this->data['org']->row()->hr_job_num;
        $this->organisasi->set_where($where);
        $hr =$this->organisasi->tampil();
        $this->load->model("notadinas/database", "jobhr", true);
        $this->jobhr->set_table("hrms_job");
        $this->jobhr->set_order("job_num asc");
        // $this->jobhr->set_where(array("job_num"=>$this->data["org"]->row()->hr_job_num));
        $this->data["jobhr"]=$this->jobhr->tampil()[0];
        // $where["hr_job_num"]=$this->data['org']->row()->hr_job_num;
        $this->organisasi->set_where($where);

        $hr =$this->organisasi->tampil();
        $this->load->model("notadinas/database", "jobkepala", true);
        $this->jobkepala->set_table("hrms_job");
        $this->jobkepala->set_order("job_num asc");
        // $this->jobkepala->set_where(array("job_num"=>$this->data["org"]->row()->kepala_job_num));
        $this->data["kepala"]=$this->jobkepala->tampil()[0];

        if (count($hr)>1) {
            $this->data["indukhr"]="true";
        } else {
            $this->data["indukhr"]="false";
        }
        if (count($fia)>1) {
            $this->data["indukfia"] = "true";
        } else {
            $this->data["indukfia"] = "false";
        }

        $this->data['mid_content'] = 'content/organization/update_org';
        $this->load->view('includes/home_template', $this->data);
    }
    public function getfiatur()
    {
        $where["org_num"] = $this->input->post("org_num");
        $this->load->model("notadinas/database", "organisasi", true);
        $this->organisasi->set_table("hrms_organization");
        $this->organisasi->set_order("org_num asc");
        $this->organisasi->set_where($where);
        $org = $this->organisasi->tampil();
        if (count($org)==0) {
            echo "false";
        } else {
            $org = $org[0];
            $this->load->model("notadinas/database", "jobnya", true);
            $this->jobnya->set_table("hrms_job");
            $this->jobnya->set_order("job_num asc");
            $where = array();
            $where["job_num"] = $org->fiatur_job_num;
            $this->jobnya->set_where($where);
            echo json_encode($this->jobnya->tampil()[0]);
        }
    }
    public function gethr()
    {
        $where["org_num"] = $this->input->post("org_num");
        $this->load->model("notadinas/database", "organisasi", true);
        $this->organisasi->set_table("hrms_organization");
        $this->organisasi->set_order("org_num asc");
        $this->organisasi->set_where($where);
        $org = $this->organisasi->tampil();
        if (count($org)==0) {
            echo "false";
        } else {
            $org = $org[0];
            $this->load->model("notadinas/database", "jobnya", true);
            $this->jobnya->set_table("hrms_job");
            $this->jobnya->set_order("job_num asc");
            $where = array();
            $where["job_num"] = $org->hr_job_num;
            $this->jobnya->set_where($where);
            echo json_encode($this->jobnya->tampil()[0]);
        }
    }
    public function getnewkodefiatur()
    {
        $this->load->model("notadinas/database", "jobnya", true);
        $this->jobnya->set_table("hrms_job");
        $this->jobnya->set_order("job_id desc");
        $this->jobnya->set_where("job_id != '9999'");
        $jobnya = $this->jobnya->tampil();
        if (count($jobnya)==0) {
            echo "2001";
        } else {
            echo($jobnya[0]->job_id+1);
        }
    }
    public function upd_organization()
    {
        $this->load->model('organization');
        $this->load->model("notadinas/database", "organisasinya", true);
        $this->organisasinya->set_table("hrms_organization");
        $this->organisasinya->set_order("org_id asc");
        $where["org_num !="] = $this->input->post("org_num");
        $where["org_id"] = $this->input->post("org_id");
        $this->organisasinya->set_where($where);
        $cont = $this->organisasinya->tampil();
        if (count($cont)>0) {
            $this->data["errornya"] = "The Organization ID is already exists";
            $this->view("id", $this->input->post("org_num"));
        } else {
            $q = $this->organization->upd_org();

            if ($q) {
                $this->load->model("notadinas/database", "organisasinya", true);
                $this->organisasinya->set_table("hrms_organization");
                $this->organisasinya->set_order("org_id asc");
                $where["org_num"]=$this->input->post('org_num');
                $this->organisasinya->set_where($where);
                $organisasinya = $this->organisasinya->tampil()[0];
                $this->load->model("notadinas/database", "jobnya", true);
                $this->jobnya->set_table("hrms_job");
                $this->jobnya->set_order("job_id desc");
                $where = "job_id = '".$this->input->post("job_id_hr")."'";
                $this->jobnya->set_where($where);
                $jobnya = $this->jobnya->tampil();
                $hrjobnum =$organisasinya->hr_job_num;
                $fiajobnum =$organisasinya->fiatur_job_num;
           
                if (count($jobnya)==0) {
                    $val["job_id"] = $this->input->post("job_id_hr");
                    $val["job_name"] = $this->input->post("job_name_hr");
                    $val["job_description"] = $this->input->post("job_description_hr");
                    $val["org_num"] = $organisasinya->org_num;
                    $this->jobnya->values=$val;
                    $this->jobnya->simpan();
                    $jobnya = $this->jobnya->tampil();
                } else {
                    $val["job_id"] = $this->input->post("job_id_hr");
                    $val["job_name"] = $this->input->post("job_name_hr");
                    $val["job_description"] = $this->input->post("job_description_hr");
                    $this->jobnya->values=$val;
                    $this->jobnya->update();
                    $jobnya = $this->jobnya->tampil();
                }

                $val=array("hr_job_num"=>$jobnya[0]->job_num);
                $this->organisasinya->values=$val;
                $this->organisasinya->update();

                $val=array();
                $where= array();
                $where["job_num"] = $this->input->post("job_num_kepala");
                $this->jobnya->set_where($where);
                $val["job_name"]=$this->input->post("job_name_kepala");
                $val["job_description"]=$this->input->post("job_description_kepala");
                $this->jobnya->values=$val;
                $this->jobnya->update();
                /* $this->load->model("notadinas/database","pegawainya",true);
                 $this->pegawainya->set_table("hrms_employees");
                 $where = "emp_job = '".$hrjobnum."'";
                 $val=array("emp_job"=>$jobnya[0]->job_num,"job_code"=>$jobnya[0]->job_code);

                 $this->pegawainya->set_where($where);
                 $this->pegawainya->values=$val;
                 $this->pegawainya->update();
                 $where = "job_num = '".$fiajobnum."'";
                 $this->jobnya->set_where($where);
                 $jobnya=$this->jobnya->tampil();
                 $where = "emp_job = '".$fiajobnum."'";
                 $val=array("emp_job"=>$jobnya[0]->job_num,"job_code"=>$jobnya[0]->job_code);
                 $this->pegawainya->set_where($where);
                 $this->pegawainya->values=$val;
                 $this->pegawainya->update();*/
                redirect('/org');
            }
        }
    }
    
    public function hapus_org($orgnum)
    {
        $this->load->model('organization');
        $q = $this->organization->delete_org($orgnum);

        if ($q) {
            redirect('/org');
        }
    }
}
