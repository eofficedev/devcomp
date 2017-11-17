<?php

class Employee extends CI_Model {
    /*
     * function untuk memperoleh detail data dari employee
     * berdasarkan usernamenya
     */

    function get_detail_emp($username) {
        $this->db->select('A.emp_num,A.emp_id as id_emp,A.email_password,A.email_username,A.emp_firstname,A.emp_lastname,A.job_code,A.org_code,A.org_id,B.emp_role,B.emp_username');
        $this->db->from('hrms_employees as A');
        $this->db->join('hrms_user as B', 'A.emp_num = B.emp_id');
        $this->db->where('B.emp_username', $username);
        $query = $this->db->get();
        return $query;
    }

    /*
     * function untuk memperoleh list seluruh employee
     */

    function get_all_emp() {
        $this->db->select('A.emp_id,A.emp_num,A.emp_firstname,A.email_password,A.email_username,A.emp_lastname,A.emp_dob,A.emp_email,A.emp_street,B.job_name,C.org_name');
        $this->db->from('hrms_employees as A');
        $this->db->where('A.emp_firstname not like', 'admin');
        $this->db->where('A.emp_id <>', 9999);
        $this->db->where('A.emp_id <>', 0000000);
        $this->db->where('A.emp_id <>', 9998);
        $this->db->join('hrms_job as B', 'A.emp_job=B.job_num');
        $this->db->join('hrms_organization as C', 'C.org_num=A.org_id');
        if ($this->input->post('keyword') != null && $this->input->post('filter') != null) {
            $this->db->like(strtolower($this->input->post('filter')), strtolower($this->input->post('keyword')));
        }

        $this->db->order_by('A.emp_num', 'ASC');
        $q = $this->db->get();

        return $q;
    }

    function get_total_emp() {
        $this->db->select('A.emp_id');
        $this->db->from('hrms_employees as A');
        $this->db->where('A.emp_firstname not like', 'admin');
        $this->db->where('A.emp_id <>', 9999);
        $this->db->where('A.emp_id <>', 0000000);
        $this->db->where('A.emp_id <>', 9998);
        $this->db->order_by('A.emp_num', 'ASC');
        $q = $this->db->get("");

        return $q->num_rows();
    }

    /*
     * function untuk menambah data employee baru
     */

    function add_employee() {
        $data = array(
            "emp_id" => $this->input->post('emp_id'),
            "emp_firstname" => $this->input->post('emp_firstname'),
            "emp_lastname" => $this->input->post('emp_lastname'),
            "emp_gender" => $this->input->post('gender'),
            "emp_dob" => $this->input->post("emp_dob"),
            "emp_street" => $this->input->post("emp_street"),
            "emp_email" => $this->input->post("emp_email"),
            "emp_cutah" => "10",
            "emp_trip" => "10",
            "emp_cubes" => "10",
            "org_code" => $this->input->post('org_code'),
            "org_id" => $this->input->post("emp_org"),
            "emp_job" => $this->input->post('emp_job'),
            "job_code" => $this->input->post('job_code'),
            "org_code" => $this->input->post('org_code'),
            "email_username" => $this->input->post('email_username'),
            "email_password" => $this->input->post('email_password')
        );


        $q = $this->db->insert('hrms_employees', $data);
        $this->db->select('emp_num');
        $this->db->from('hrms_employees');
        $this->db->where('emp_id', $this->input->post('emp_id'));
        $q3 = $this->db->get();
        $data3 = $q3->row();
        $empnum = $data3->emp_num;

        $emptelp = $this->input->post('emp_work_telp');
        foreach ($emptelp as $row) {
            $data = array(
                "emp_num" => $empnum,
                "telp_no" => $row
            );

            $this->db->insert('emp_telp', $data);
        }


        $data2 = array(
            "emp_id" => $empnum,
            "emp_username" => $this->input->post('emp_id'),
            "emp_password" => md5($this->input->post('password')),
            "status" => '1'
        );

        $q2 = $this->db->insert('hrms_user', $data2);

        $this->db->select('emp_counter_id');
        $this->db->from('hrms_counter');
        $q = $this->db->get();
        $empCurr = $q->row()->emp_counter_id;

        $nextId = $empCurr + 1;
        $dataConfig = array(
            'emp_counter_id' => $nextId
        );
        $this->db->where('id', '1');
        $this->db->update('hrms_counter', $dataConfig);
        if ($q && $q2) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * function untuk mendapatkan data employee berdasarkan emp number nya
     */

    function get_emp_data($user) {
        $this->db->select("*");
        $this->db->from('hrms_employees');
        $this->db->where('emp_num', $user);
        $query = $this->db->get();
        return $query;
    }

    /*
     * function untuk mendapatkan detail data login user
     * berdasarkan emp id nya
     */

    function get_user_data($user) {
        $this->db->select('emp_id,emp_username,emp_password');
        $this->db->from('hrms_user');
        $this->db->where('emp_id', $user);
        $query = $this->db->get();

        return $query;
    }

    /*
     * function untuk mengupdate data employee
     */

    function update_emp() {

        $this->load->model('job');
        $job_code = $this->job->get_job_code($this->input->post('emp_job'));

        $this->load->model('organization');
        $org_code = $this->organization->get_org_code($this->input->post('emp_org'));

        $data = array(
            "emp_id" => $this->input->post('emp_id'),
            "emp_firstname" => $this->input->post('emp_firstname'),
            "emp_lastname" => $this->input->post('emp_lastname'),
            "emp_gender" => $this->input->post('gender'),
            "emp_dob" => $this->input->post("emp_dob"),
            "emp_street" => $this->input->post("emp_street"),
            "email_username" => $this->input->post("email_username"),
            "email_password" => $this->input->post("email_password"),
            "emp_cutah" => "10",
            "emp_trip" => "10",
            "emp_cubes" => "10",
            "emp_email" => $this->input->post("emp_email"),
            "emp_job" => $this->input->post("emp_job"),
            "job_code" => $job_code,
            "org_code" => $org_code,
            "org_id" => $this->input->post("emp_org")
        );

        $data2 = array(
            "emp_id" => $this->input->post('emp_num'),
            "emp_username" => $this->input->post('username'),
            "emp_password" => md5($this->input->post('password'))
        );

        $this->db->where('emp_id', $this->input->post('emp_id'));
        $this->db->update('hrms_employees', $data);

        $this->db->where('emp_num', $this->input->post('emp_num'));
        $this->db->delete('emp_telp');

        $telp = $this->input->post('telp_no');
        $i = 0;
        for ($i = 0; $i < count($telp); $i++) {

            if ($telp[$i] != "") {
                $datatelp = array(
                    "emp_num" => $this->input->post('emp_num'),
                    "telp_no" => $telp[$i]
                );
                $this->db->insert('emp_telp', $datatelp);
            }
        }

        if ($this->input->post('password') != "") {
            $this->db->where('emp_id', $this->input->post('emp_num'));
            $this->db->update('hrms_user', $data2);
        }
    }

    /*
     * function untuk mendapatkan list employee
     * berdasarkan keyword yang diinput oleh user
     */

    function get_filter_employee() {

        $this->db->select('A.emp_id,A.emp_firstname,A.emp_lastname,A.emp_dob,A.emp_email,A.emp_work_telp,A.emp_street,B.job_name');
        $this->db->from('hrms_employees as A');
        $this->db->join('hrms_job as B', 'A.emp_job = B.job_num');
        $this->db->where('A.emp_firstname not like', 'admin');

        if ($this->input->post('keyword') != "") {
            $this->db->like(mb_strtolower($this->input->post('filter')), mb_strtolower($this->input->post('keyword')));
        }

        $query = $this->db->get();

        return $query;
    }

    function get_all_atasan() {

        $this->db->select('A.emp_id,B.org_id');
        $this->db->from('hrms_user as A');
        $this->db->where('A.emp_username', $this->session->userdata('username'));
        $this->db->join('hrms_employees as B', 'A.emp_id=B.emp_num');
        $dt = $this->db->get()->row();
        $empnum = $dt->emp_id;
        $orgnum = $dt->org_id;
        
        $this->db->select('fiatur_job_num');
        $this->db->from('hrms_organization');
        $this->db->where('org_num', $orgnum);
        $fia = $this->db->get()->row()->fiatur_job_num;

        $this->db->select('emp_num');
        $this->db->from('flow_sppd');
        $flow = $this->db->get();

        $this->db->select("A.emp_num,A.emp_id,A.emp_firstname,A.emp_lastname,C.job_code,A.org_code,C.job_id,C.job_name,D.org_name");
        $this->db->from('hrms_employees as A');
        $this->db->where('A.org_id', $orgnum);
        $this->db->where('A.emp_num !=', $empnum);
        $this->db->where('A.emp_num !=', '24');
        $this->db->where('A.emp_job !=', $fia);

        foreach ($flow->result() as $row) {
            $this->db->where('A.emp_num !=', $row->emp_num);
        }

        $this->db->join('hrms_job as C', 'A.emp_job=C.job_num');
        $this->db->join('hrms_organization as D', 'A.org_id=D.org_num');
        $q = $this->db->get();

        return $q;
    }
    
    function get_all_atasan_pmh() {

        $this->db->select('A.emp_id,B.org_id');
        $this->db->from('hrms_user as A');
        $this->db->where('A.emp_username', $this->session->userdata('username'));
        $this->db->join('hrms_employees as B', 'A.emp_id=B.emp_num');
        $dt = $this->db->get()->row();
        $empnum = $dt->emp_id;
        $orgnum = $dt->org_id;
        
        $this->db->select('fiatur_job_num');
        $this->db->from('hrms_organization');
        $this->db->where('org_num', $orgnum);
        $fia = $this->db->get()->row()->fiatur_job_num;

        $this->db->select('emp_num');
        $this->db->from('flow_sppd');
        $flow = $this->db->get();

        $this->db->select("A.emp_num,A.emp_id,A.emp_firstname,A.emp_lastname,C.job_code,A.org_code,C.job_id,C.job_name,D.org_name");
        $this->db->from('hrms_employees as A');
        $this->db->where('A.org_id', $orgnum);
        $this->db->where('A.emp_num !=', '24');
        $this->db->where('A.emp_job !=', $fia);

        foreach ($flow->result() as $row) {
            $this->db->where('A.emp_num !=', $row->emp_num);
        }

        $this->db->join('hrms_job as C', 'A.emp_job=C.job_num');
        $this->db->join('hrms_organization as D', 'A.org_id=D.org_num');
        $q = $this->db->get();

        return $q;
    }

    function get_all_atasan_admin() {

        $this->db->select('A.emp_id');
        $this->db->from('hrms_user as A');
        $this->db->where('A.emp_username', $this->session->userdata('username'));
        $this->db->join('hrms_employees as B', 'A.emp_id=B.emp_num');
        $dt = $this->db->get()->row();
        $empnum = $dt->emp_id;

        $this->db->select('emp_num');
        $this->db->from('flow_sppd');
        $flow = $this->db->get();
        
        $this->db->select('fiatur_job_num');
        $this->db->from('hrms_organization');
        $this->db->where('org_num !=','8');
        $fia = $this->db->get();

        $this->db->select("A.emp_num,A.emp_id,A.emp_firstname,A.emp_lastname,C.job_code,A.org_code,C.job_id,C.job_name,D.org_name");
        $this->db->from('hrms_employees as A');
        $this->db->where('A.emp_num !=', $empnum);
        $this->db->where('A.emp_num !=', '24');
        
        foreach ($flow->result() as $row) {
            $this->db->where('A.emp_num !=', $row->emp_num);
        }
        
        $this->db->join('hrms_job as C', 'A.emp_job=C.job_num');
        foreach ($fia->result() as $row2) {
            $this->db->where('A.emp_job <>', $row2->fiatur_job_num);
        }
        $this->db->join('hrms_organization as D', 'A.org_id=D.org_num');
        $q = $this->db->get();
        return $q;
    }

    /*
     * Function untuk mendapatkan data employee berdasarkan name
     * yang diinput oleh user
     */

    function get_emp_byname($keyword) {
        $this->db->select("A.emp_num,A.emp_id,A.emp_firstname,A.emp_lastname,C.job_code,A.org_code,C.job_name");
        $this->db->from('hrms_employees as A');
        $this->db->like(mb_strtolower('A.emp_firstname'), mb_strtolower($keyword));
        $this->db->join('hrms_job as C', 'A.emp_job=C.job_num');
        $q = $this->db->get();

        $data = array();
        foreach ($q->result() as $row) {
            array_push($data, $row);
        }

        return $data;
    }

    /*
     * function untuk memperoleh manager dari suatu employee
     */

    function get_mgr_id($empnum) {
        $this->db->select('mgr_id');
        $this->db->from('hrms_employees');
        $this->db->where('emp_num', $empnum);
        $q = $this->db->get();

        $row = $q->row();
        return $row->mgr_id;
    }

    /*
     * function untuk memperoleh list employee berdasarkan organisasi
     * masing-masing
     */

    function load_emp_by_org($id) {
        $this->db->select('emp_num,emp_id,emp_firstname,emp_lastname,org_code');
        $this->db->from('hrms_employees');
        $this->db->where('emp_id <>', 9999);
        $this->db->where('org_id', $id);
        $q = $this->db->get();

        return $q;
    }

    /*
     * function untuk menampilkan data pemeriksa dari suatu sppd
     */

    function load_pemeriksa_sppd() {
        $this->db->select('A.emp_num,A.emp_id,A.emp_firstname,A.emp_lastname,C.job_name,A.org_code,A.job_code,C.job_name');
        $this->db->from('flow_sppd as B');
        $this->db->join('hrms_employees as A', 'A.emp_num=B.emp_num', 'left outer');
        $this->db->join('hrms_job as C', 'A.emp_job=C.job_num');
        $this->db->where('B.fitur_id', '3');
        $this->db->or_where('B.fitur_id', '4');
        $this->db->order_by('B.flow_id', "ASC");
        $q = $this->db->get();
        return $q;
    }

    /*
     * function untuk memperoleh counter terakhir dari employee
     */

    function load_curr_num() {
        $this->db->select('emp_start_num,emp_counter_id');
        $this->db->from('hrms_counter');
        $q = $this->db->get();

        $row = $q->row();
        $curr_num = $row->emp_start_num + $row->emp_counter_id;
        return $curr_num;
    }

    /*
     * function untuk mendapat data employee berdasarkan username
     */

    function get_employee_data_by_username() {


        $this->db->select('emp_id');
        $this->db->from('hrms_user');
        $this->db->where('emp_username', $this->session->userdata('username'));

        $q = $this->db->get();
        $r = $q->row();
        $empid = $r->emp_id;

        $this->db->select("emp_num,emp_firstname,emp_lastname,emp_gender,emp_dob,emp_street,emp_email");
        $this->db->from("hrms_employees");
        $this->db->where("emp_num", $empid);

        $q2 = $this->db->get();

        return $q2;
    }

    function get_fiatur_by_org($orgnum) {
        $this->db->select('fiatur_job_num');
        $this->db->from('hrms_organization');
        $this->db->where('org_num', $orgnum);

		$fiatur_job_num = 0;
        $fiatur_job_num = $this->db->get()->row()->fiatur_job_num;
		
        $this->db->select('A.emp_num,A.emp_id,A.emp_firstname,A.emp_lastname,A.job_code,A.org_code,B.job_name');
        $this->db->from('hrms_employees as A');
        $this->db->join('hrms_job as B', 'A.emp_job=B.job_num');
        $this->db->where('A.emp_job', $fiatur_job_num);

        $q = $this->db->get();

        return $q;
    }

    function get_jabatan_by_keyword() {
        $keyword = strtolower($this->input->post('keyword'));

        $this->db->select('A.emp_id,B.org_id');
        $this->db->from('hrms_user as A');
        $this->db->where('A.emp_username', $this->session->userdata('username'));
        $this->db->join('hrms_employees as B', 'A.emp_id=B.emp_num');
        $dt = $this->db->get()->row();
        $empnum = $dt->emp_id;
        $orgnum = $dt->org_id;

        $this->db->select("A.emp_num,A.emp_id,A.emp_firstname,A.emp_lastname,C.job_code,A.org_code,C.job_id,C.job_name,D.org_name");
        $this->db->from('hrms_employees as A');
        $this->db->join('hrms_job as C', 'A.emp_job=C.job_num');
        $this->db->join('hrms_organization as D', 'A.org_id=D.org_num');
        $this->db->where('A.emp_num !=', '24');
        $this->db->where('A.org_id', $orgnum);
        $this->db->where('A.emp_num !=', $empnum);
        if ($keyword != "") {
            $this->db->like(strtolower("C.job_name"), $keyword);
        }
        $q = $this->db->get()->result_array();

        return json_encode($q);
    }

    function get_employee_by_name() {
        $keyword = strtolower($this->input->post('key'));

        $this->db->select('A.emp_id,B.org_id');
        $this->db->from('hrms_user as A');
        $this->db->where('A.emp_username', $this->session->userdata('username'));
        $this->db->join('hrms_employees as B', 'A.emp_id=B.emp_num');
        $dt = $this->db->get()->row();
        $empnum = $dt->emp_id;
        $orgnum = $dt->org_id;


        $this->db->select("A.emp_num,A.emp_id,A.emp_firstname,A.emp_lastname,C.job_code,A.org_code,C.job_id,C.job_name,D.org_name");
        $this->db->from('hrms_employees as A');
        $this->db->join('hrms_job as C', 'A.emp_job=C.job_num');
        $this->db->join('hrms_organization as D', 'A.org_id=D.org_num');
        $this->db->where('A.emp_num !=', '24');
        $this->db->where('A.org_id', $orgnum);
        $this->db->where('A.emp_num !=', $empnum);

        if ($keyword != "") {
            $this->db->like(strtolower("A.emp_firstname"), $keyword);
            $this->db->or_like(strtolower("A.emp_lastname"), $keyword);
        }
        $q = $this->db->get()->result_array();

        return json_encode($q);
    }

    function load_list_profile($empnum) {
        $this->db->select('prof_id,prof_name');
        $this->db->from('prof_sppd');
        $this->db->where('emp_num', $empnum);
        $q = $this->db->get();

        return $q;
    }

    function load_detail_profile($profid) {
        $this->db->select('A.emp_num,A.prof_order,B.emp_id,B.emp_firstname,B.emp_lastname,B.job_code,B.org_code,C.job_id,C.job_name');
        $this->db->from('prof_detail as A');
        $this->db->where('A.prof_id', $profid);
        $this->db->join('hrms_employees as B', 'A.emp_num=B.emp_num');
        $this->db->join('hrms_job as C', 'C.job_num=B.emp_job');
        $this->db->order_by('A.prof_order', 'ASC');
        $q = $this->db->get()->result_array();

        return json_encode($q);
    }

    function del_profile() {
        $id = $this->input->post('prof_id');
        $this->db->where('prof_id', $id);
        $q = $this->db->delete('prof_sppd');

        return $q;
    }

    function get_employee_telp($empnum) {
        $this->db->select('telp_no');
        $this->db->from('emp_telp');
        $this->db->where('emp_num', $empnum);

        $q = $this->db->get();
        return $q;
    }
    
    function del_emp($empnum){
        $this->db->where('emp_num',$empnum);
        $q = $this->db->delete('hrms_employees');
        return $q;
    }

}
