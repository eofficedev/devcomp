<?php

class Admin_config extends CI_Model {
    /*
     * Function untuk mengupdate config counter employee, sppd, dan job number
     */

    function upd_config_data() {
        $data = array(
            "emp_start_num" => $this->input->post('emp_start'),
            "emp_counter_id" => "1",
            "sppd_start_num" => $this->input->post('sppd_start'),
            "sppd_counter_id" => "1",
            "job_start_num" => $this->input->post('job_start'),
            "job_counter_id" => "1",
            "org_start_num" => $this->input->post('job_start'),
            "org_counter_id" => "1"
        );
        $this->db->where('id','1');
        $q = $this->db->update("hrms_counter", $data);
        
        $this->db->where('emp_num <>','1');
        $this->db->where('emp_num <>','2');
        $this->db->where('emp_num <>','24');
        $q2 = $this->db->delete('hrms_employees');
        
        $this->db->where('job_num <>','45');
        $q3 = $this->db->delete('hrms_job'); 
        
        $this->db->where('org_num <>', 8);
        $this->db->delete('hrms_organization');
        
        if ($q && $q2 && $q3) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * function untuk memperoleh seluruh config aplikasi
     */

    function load_config_data() {
        return $this->db->get("hrms_counter");
    }

    /*
     * function untuk menyimpan konfigurasi flow sppd
     */

    function save_sppd_flow() {
        $this->db->empty_table('flow_sppd');

        $fitur = $this->input->post('fitur_id');
        $empnum = $this->input->post('emp_num');
        
        for ($i = 0; $i < count($fitur); $i++) {
            $data = array(
                "fitur_id" => $fitur[$i],
                "emp_num" => $empnum[$i]
            );
            $this->db->insert("flow_sppd", $data);
        }
        return true;
    }

    /*
     * Function untuk menampilkan flow konfigurasi dari sppd
     */

    function get_list_flow_sppd() {
        $this->db->select('B.emp_num,A.fitur_id,B.emp_id,B.emp_firstname,B.emp_lastname,C.job_name,D.org_name');
        $this->db->from('flow_sppd as A');
        $this->db->join('hrms_employees as B', 'A.emp_num=B.emp_num');
        $this->db->join('hrms_job as C', 'B.emp_job=C.job_num');
        $this->db->join('hrms_organization as D', 'B.org_id=D.org_num');
        $this->db->where('A.fitur_id', '3');
        $this->db->or_where('A.fitur_id', '4');
        $this->db->order_by('A.flow_id', "ASC");
        $q = $this->db->get();
        return $q;
    }

    function load_app_config() {
        $this->db->select('*');
        $this->db->from('hrms_config');
        $q = $this->db->get();

        return $q;
    }

    /*
     * Function yang digunakan untuk menghapus pemeriksa
     * dari flow sppd
     * $id = ID pemeriksa
     */

    function hapus_pemeriksa($id) {
        $this->db->where("emp_num", $id);
        $q = $this->db->delete("flow_sppd");

        if ($q) {
            return true;
        } else {
            return false;
        }
    }

    function do_upload() {

      
        $this->load->library('upload');

        $config = array(
            'allowed_types' => 'jpg',
            'upload_path' => realpath(APPPATH . '../css'),
            'max_size' => 2000,
            'overwrite' => TRUE,
            'file_name' => 'back'
        );
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file_banner')) { // array of input names (type file)
            $error = array('error' => $this->upload->display_errors());
        } else {  
            $data_banner = array('upload_data' => $this->upload->data('file_banner')); // array
        }
        
        $config2 = array(
            'allowed_types' => 'jpg|png|gif|jpeg',
            'upload_path' => realpath(APPPATH . '../css'),
            'max_size' => 2000,
            'overwrite' => TRUE,
            'file_name' => 'logo-telkom'
        );
        $this->upload->initialize($config2);
        
        
        if (!$this->upload->do_upload('file_logo')) { // array of input names (type file)
            $error = array('error' => $this->upload->display_errors());
            echo print_r($error);
        } else {  
            $data_logo = array('upload_data' => $this->upload->data('file_logo')); // array
            echo print_r($data_logo);
        }
        
        $config3 = array(
            'allowed_types' => 'jpg',
            'upload_path' => realpath(APPPATH . '../css'),
            'max_size' => 2000,
            'overwrite' => TRUE,
            'file_name' => 'banner-bottom'
        );
        $this->upload->initialize($config3);
        if (!$this->upload->do_upload('file_bottom_banner')) { // array of input names (type file)
            $error = array('error' => $this->upload->display_errors());
        } else {  
            $data_bottom_banner = array('upload_data' => $this->upload->data('file_bottom_banner')); // array
        }
          $data = array(
            "app_title"=>$this->input->post('app_title'),
            "tech_support"=>$this->input->post('tech_support'),
            "link1"=>$this->input->post('link1'),
            "link1_desc"=>$this->input->post('link1_desc'),
            "link2"=>$this->input->post('link2'),
            "link2_desc"=>$this->input->post('link2_desc'),
            "logo_url"=>$data_logo["upload_data"]["file_name"]
        );
        
        $this->db->where('id','1');
        $this->db->update('hrms_config',$data);
          
        return $data;
    }
    
    function upload_anggaran() {

        $data = array(
            "kode_anggaran"=>$this->input->post('kode_anggaran'),
            "program_name"=>$this->input->post('program'),
            "Years"=>$this->input->post('Years'),
            "Anggaran"=>$this->input->post('Anggaran')
        );
        $this->db->update('detail_anggaran',$data);
        $this->load->library('upload');
        
        return $data;
    }

}
