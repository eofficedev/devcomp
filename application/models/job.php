<?php

class Job extends CI_Model {
    /*
     * Function untuk menampilkan seluruh job yang terdaftar
     */

    function get_all_job() {
        $this->db->select('A.job_num,A.job_id,A.job_name,A.job_description,B.org_name');
        $this->db->from('hrms_job as A');
        $this->db->join('hrms_organization as B', 'B.org_num=A.org_num');
        $this->db->where('A.job_num !=', '30');
        $this->db->where('A.job_num !=','45');
        if ($this->input->post('filter2') != null) {
            $this->db->where('A.org_num', $this->input->post('filter2'));
        }

        $this->db->order_by("A.job_id", "ASC");
        $query = $this->db->get();

        return $query;
    }

    /*
     * function untuk menambahkan job baru
     */

    function add_job() {
        $data = array(
            'job_id' => $this->input->post('job_id'),
            'job_name' => $this->input->post('job_name'),
            'job_description' => $this->input->post('job_description'),
            'job_code' => $this->input->post('job_code'),
            'org_num' => $this->input->post('organization')
        );

        $q = $this->db->insert('hrms_job', $data);

        $this->db->select('job_counter_id');
        $this->db->from('hrms_counter');
        $counter = $this->db->get()->row()->job_counter_id;

        $nextCounter = $counter + 1;

        $data2 = array(
            'job_counter_id' => $nextCounter
        );
        $this->db->where('id', '1');
        $this->db->update('hrms_counter', $data2);

        if ($q) {
            return true;
        } else {
            return false;
        }
    }

    function add_job_ajax() {
        $data = array(
            'job_id' => $this->input->post('job_id'),
            'job_name' => $this->input->post('job_name'),
            'job_description' => $this->input->post('job_description'),
            'job_code' => $this->input->post('job_code'),
            'org_num' => $this->input->post('organization')
        );

        $q = $this->db->insert('hrms_job', $data);

        $this->db->select('job_counter_id');
        $this->db->from('hrms_counter');
        $counter = $this->db->get()->row()->job_counter_id;

        $nextCounter = $counter + 1;

        $data2 = array(
            'job_counter_id' => $nextCounter
        );
        $this->db->where('id', '1');
        $this->db->update('hrms_counter', $data2);

        if ($q) {
            $this->db->select('job_num');
            $this->db->from('hrms_job');
            $this->db->where('job_id', $this->input->post('job_id'));
            $jobid = $this->db->get()->row()->job_num;
            return $jobid;
        } else {
            return false;
        }
    }
    /*
     * function untuk menampilkan detail dari job
     */

    function get_job_data($id) {
        $this->db->select('A.job_num,A.job_id,A.job_name,A.job_code,A.job_description,A.org_num');
        $this->db->from('hrms_job as A');
        $this->db->where('A.job_num', $id);
        $q = $this->db->get();
        return $q;  
    }
    /*
     * function untuk mengudate job data
     */

    function upd_job() {
        $data = array(
            'job_id' => $this->input->post('job_id'),
            'job_name' => $this->input->post('job_name'),
            'job_description' => $this->input->post('job_description'),
            'job_code' => $this->input->post('job_code'),
            'org_num' => $this->input->post('org')
        );

        $this->db->where('job_id', $this->input->post('job_id'));
        $q = $this->db->update('hrms_job', $data);
        $this->update_user($this->input->post('emp_num'));
        if ($q) {
            return true;
        } else {
            return false;
        }
    }

    function update_user($empnum) {

        if ($empnum != 0) {
            $data = array("status" => "1");
            $this->db->where('emp_id', $empnum);
            $this->db->update('hrms_user', $data);
        }
    }

    /*
     * function untuk mendapatkan detail job data
     * berdasarkan job code nya
     */

    function get_job_data_by_code($jobcode) {
        $this->db->select('A.job_name, B.org_name');
        $this->db->from('hrms_job as A');
        $this->db->join('hrms_organization as B', 'A.org_num=B.org_num');
        $this->db->where('A.job_code', $jobcode);

        $q = $this->db->get();

        return $q;
    }

    /*
     * function untuk memfilter job berdasarkan keyword
     * yang diinput
     */

    function get_filter_job() {

        $this->db->select('A.emp_id,A.emp_firstname,A.emp_lastname,A.emp_dob,A.emp_email,A.emp_work_telp,A.emp_street,B.job_name');
        $this->db->from('hrms_job as A');
        $this->db->join('hrms_job as B', 'A.emp_job = B.job_num');
        $this->db->where('A.emp_firstname not like', 'admin');
        $this->db->where('B.job_num !=','45');

        if ($this->input->post('keyword') != "") {
            $this->db->like(mb_strtolower($this->input->post('filter')), mb_strtolower($this->input->post('keyword')));
        }
        $query = $this->db->get();

        return $query;
    }

    /*
     * Function untuk memperoleh job code
     * berdasarkan job numbernya
     */

    function get_job_code($jobnum) {
        $this->db->select('job_code');
        $this->db->from('hrms_job');
        $this->db->where('job_num', $jobnum);
        $q = $this->db->get();

        $row = $q->row();

        return $row->job_code;
    }

    /*
     * Function untuk memperoleh job data
     * berdasarkan organisasinya
     */

    function list_job_by_org() {
        $orgnum = $this->input->post('org');
        $this->db->select('A.job_num,A.job_code,A.job_name,A.job_id,B.org_code');
        $this->db->from('hrms_job as A');
        $this->db->where('A.org_num', $orgnum);
        $this->db->where('A.job_id <>', '0');
        $this->db->where('A.job_num <>','45');
        $this->db->join('hrms_organization as B', 'A.org_num=B.org_num');
        $q = $this->db->get();
        return json_encode($q->result_array());
    }

    function load_job_by_org($org) {
        $this->db->select('A.job_num,A.job_code,A.job_name,A.job_id,B.org_code');
        $this->db->from('hrms_job as A');
        $this->db->where('A.org_num', $org);
        $this->db->where('A.job_num <>','45');
        $this->db->join('hrms_organization as B', 'A.org_num=B.org_num');
        $q = $this->db->get();
        return $q;
    }

    /*
     * Function untuk memperoleh detail manager
     * berdasarkan job number nya masing-masing
     */

    function get_mgr_detail() {
        $jobnum = $this->input->post('job_num');

        $this->db->select("A.job_code,C.org_code");
        $this->db->from("hrms_job as A");
        $this->db->where("A.job_num", $jobnum);
        $this->db->join("hrms_organization as C", "A.org_num=C.org_num");
        $q = $this->db->get();
        return json_encode($q->result_array());
    }

    /*
     * function untuk memperoleh counter job number terakhir
     */

    function load_curr_num() {
        $this->db->select('job_start_num,job_counter_id');
        $this->db->from('hrms_counter');
        $q = $this->db->get();

        $row = $q->row();
        $curr_num = $row->job_start_num + $row->job_counter_id;
        return $curr_num;
    }

    function delete_job($job_num) {
        $this->db->where('job_num', $job_num);
        $q = $this->db->delete('hrms_job');

        return $q;
    }

}
