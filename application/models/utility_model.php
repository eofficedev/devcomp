<?php

class Utility_model extends CI_Model {
    /*
     * Function untuk mem-proses penggantian password
     */

    function process_change_password() {
        $this->db->select('emp_password');
        $this->db->from('hrms_user');
        $this->db->where('emp_username', $this->session->userdata('username'));

        $query = $this->db->get();
        $row = $query->row();

        $pass = $row->emp_password;

        if (md5($this->input->post('old')) == $pass) {
            $newPass = md5($this->input->post('new'));
            $confirmPass = md5($this->input->post('confirm'));

            if ($newPass == $confirmPass) {
                $data = array(
                    "emp_password" => $newPass
                );

                $this->db->where('emp_username', $this->session->userdata('username'));
                $q = $this->db->update('hrms_user', $data);

                if ($q) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    function process_edit_profile() {
        
        $data = array(
            "emp_firstname" => $this->input->post('firstname'),
            "emp_lastname" => $this->input->post('lastname'),
            "emp_gender" => $this->input->post('gender'),
            "emp_dob" => $this->input->post('dob'),
            "emp_street" => $this->input->post('address'),
            "emp_email" => $this->input->post('email')
        );
        

        $this->db->where('emp_num', $this->input->post('emp_num'));
        $q = $this->db->update('hrms_employees', $data);

        $this->db->where('emp_num',$this->input->post('emp_num'));
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
        
        if ($q) {
            return true;
        } else {
            return false;
        }
    }

}
