<?php

class Sppds extends CI_Model {

    var $gallery_path;
    var $gallery_path_url;

    public function __construct() {
        parent::__construct();

        $this->gallery_path = realpath(APPPATH . '../images');
        $this->gallery_path_url = base_url() . 'images/';
    }

    function get_total_draft_sppd($empnum) {
        $this->db->select('A.sppd_id,A.sppd_num,A.sppd_tgl,A.sppd_tuj,B.emp_id,B.emp_firstname,B.emp_lastname, C.emp_id as pem_id, C.emp_firstname as pem_fname, C.emp_lastname as pem_lname');
        $this->db->from('sppd_data as A');
        $this->db->where('A.emp_id', $empnum);
        $this->db->where('A.sppd_status', 2);
        $this->db->join('hrms_employees as B', 'A.emp_id=B.emp_num');
        $this->db->join('hrms_employees as C', 'A.emp_create_id=C.emp_num');
        $this->db->order_by('A.sppd_id', 'DESC');
        $query = $this->db->get();
        return $query->num_rows();
    }

    /*
     * function untuk menampilkan seluruh draft sppd
     * sesuai dengan pemohon / user yang sedang aktif
     * 
     * 
     */

    function get_draft_sppd($empnum, $num, $offset) {
        $this->db->select('A.sppd_id,A.sppd_num,A.sppd_tgl,A.sppd_tuj,B.emp_id,B.emp_firstname,B.emp_lastname, C.emp_id as pem_id, C.emp_firstname as pem_fname, C.emp_lastname as pem_lname');
        $this->db->from('sppd_data as A');
        $this->db->where('A.emp_create_id', $empnum);


        if ($this->input->post('keyword') != null) {
            $key = $this->input->post('keyword');
            $this->db->like(strtolower('A.sppd_dest'), strtolower($key));
        }
        $this->db->join('hrms_employees as B', 'A.emp_id=B.emp_num');
        $this->db->join('hrms_employees as C', 'A.emp_create_id=C.emp_num');
        $this->db->where('A.sppd_status', 2);
        $this->db->order_by('A.sppd_id', 'DESC');
        $query = $this->db->get("", $num, $offset);
        return $query;
    }

    function get_total_proses_sppd($empnum) {
        $status = array('1', '4');
        $fromDate = date("Y-m-d", strtotime("-1 months"));
        $this->db->where_in('sppd_status', $status);
        $this->db->where('sppd_tgl <=', $fromDate);
        $this->db->delete('sppd_data');

        $this->db->select('A.sppd_num');
        $this->db->from('sppd_data as A');
        $this->db->where('A.emp_id', $empnum);
        $this->db->join('hrms_employees as B', 'A.emp_id=B.emp_num');
        $this->db->join('hrms_employees as C', 'A.emp_create_id=C.emp_num');
        $this->db->join('sppd_examine as D', 'D.sppd_num=A.sppd_num');
        $this->db->join('hrms_employees as E', 'E.emp_num=D.pem_id');
        $this->db->where('D.flag', '1');
        $this->db->where('D.status', '0');
        $this->db->where('A.sppd_status', 1);
        $this->db->order_by('A.sppd_num', 'DESC');
        $query = $this->db->get();

        return $query->num_rows();
    }

    /*
     * Menampilkan seluruh sppd yang perlu di proses oleh pemeriksa
     * 
     */

    function get_proses_sppd($empnum, $num, $offset) {

        $this->db->select('A.sppd_num,A.sppd_id,A.sppd_tgl,A.sppd_tuj,B.emp_id,B.emp_firstname,B.emp_lastname, C.emp_id as pem_id, C.emp_firstname as pem_fname, C.emp_lastname as pem_lname,E.emp_firstname as curr_fname,E.emp_lastname as curr_lname,E.emp_id as curr_empid,D.order');
        $this->db->from('sppd_data as A');
        $this->db->where('A.emp_id', $empnum);
        $this->db->join('hrms_employees as B', 'A.emp_id=B.emp_num');
        $this->db->join('hrms_employees as C', 'A.emp_create_id=C.emp_num');
        $this->db->join('sppd_examine as D', 'D.sppd_num=A.sppd_num');
        $this->db->join('hrms_employees as E', 'E.emp_num=D.pem_id');
        $this->db->where('D.order !=', '0');
        $this->db->where('D.flag', '1');
        $this->db->where('D.status', '0');
        $this->db->where('A.sppd_status', 1);
        if ($this->input->post('keyword') != null) {
            $key = $this->input->post('keyword');
            $this->db->like(strtolower('A.sppd_dest'), strtolower($key));
        }
        $this->db->order_by('A.sppd_num', 'DESC');
        $query = $this->db->get("", $num, $offset);
        $hasil['proses_sppd'] = $query;

        $this->db->select('A.sppd_num,A.sppd_id,A.sppd_tgl,A.sppd_tuj,B.emp_id,B.emp_firstname,B.emp_lastname,C.emp_id as pem_id, C.emp_firstname as pem_fname, C.emp_lastname as pem_lname');
        $this->db->from('sppd_data as A');
        $this->db->where('A.emp_id', $empnum);
        $this->db->where('A.sppd_status', 4);
        $this->db->join('hrms_employees as B', 'A.emp_id=B.emp_num');
        $this->db->join('hrms_employees as C', 'A.emp_create_id=C.emp_num');
        $query2 = $this->db->get();
        $hasil['reject_sppd'] = $query2;
        return $hasil;
    }

    /*
     * Function untuk menghapus draft SPPD yang dibuat
     * 
     */

    function remove($sppdnum) {
        $this->db->where('sppd_num', $sppdnum);
        $q = $this->db->delete('sppd_data');

        if ($q) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * Function untuk meng-create SPPD baru
     * 
     */

    function add_new_sppd() {

        $this->db->select('sppd_start_num,sppd_counter_id');
        $this->db->from('hrms_counter');
        $q4 = $this->db->get();
        $row_counter = $q4->row();
        $sppdnum = $row_counter->sppd_start_num + $row_counter->sppd_counter_id;

        $time = time();
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d H:i:s", $time);
        $data = array(
            "sppd_id" => $sppdnum,
            "sppd_tgl" => $tgl,
            "sppd_catt" => $this->input->post('catt'),
            "sppd_dest" => $this->input->post('destination'),
            "sppd_tuj" => $this->input->post('tujuan'),
            "sppd_dsr" => $this->input->post('dasar'),
            "sppd_ket" => $this->input->post('keterangan'),
            "sppd_depart" => $this->input->post('depart'),
            "sppd_arrive" => $this->input->post('arrive'),
            "sppd_status" => $this->input->post('tipe'),
            "sppd_desc" => "tes",
            "emp_id" => $this->input->post('emp_num'),
            "emp_create_id" => $this->input->post('emp_create_id')
        );

        $q = $this->db->insert("sppd_data", $data);

        mkdir('./upload/sppd-' . $sppdnum, 0777);

        $this->load->library('upload');
        $config = array(
            'allowed_types' => 'jpg|doc|docx|pdf',
            'upload_path' => './upload/sppd-' . $sppdnum,
            'max_size' => 20000
        );

        $files = $_FILES;
        $cpt = count($_FILES['file_sppd']['name']);

        for ($i = 0; $i < $cpt; $i++) {

            $_FILES['userfile']['name'] = $files['file_sppd']['name'][$i];
            $_FILES['userfile']['type'] = $files['file_sppd']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['file_sppd']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $files['file_sppd']['error'][$i];
            $_FILES['userfile']['size'] = $files['file_sppd']['size'][$i];

            $this->upload->initialize($config);
            $this->upload->do_upload();
        }


        if ($this->input->post('save_prof') != null) {
            $prof_name = $this->input->post('prof_name');

            $data = array(
                "prof_name" => $prof_name,
                "emp_num" => $this->input->post('emp_num')
            );

            $this->db->insert('prof_sppd', $data);
            $prof_num = mysql_insert_id();

            $pemeriksa = $this->input->post('pemeriksa-def');
            $i = 0;
            $y = 1;
            for ($i = 0; $i < count($pemeriksa); $i++) {
                $data2 = array(
                    "prof_id" => $prof_num,
                    "emp_num" => $pemeriksa[$i],
                    "prof_order" => $y
                );
                $this->db->insert('prof_detail', $data2);
                $y++;
            }
        }

        $next_counter = $row_counter->sppd_counter_id + 1;

        $d = array("sppd_counter_id" => $next_counter);
        $this->db->update("hrms_counter", $d);

        $this->db->select("sppd_num,sppd_id,emp_id");
        $this->db->from("sppd_data");
        $this->db->where("sppd_id", $sppdnum);
        $q2 = $this->db->get();

        $res = $q2->row();
        if ($this->input->post('tipe') == '1') {

            $pemeriksa = $this->input->post('pemeriksa');
            $pemdata3 = array(
                "sppd_num" => $res->sppd_num,
                "emp_id" => $res->emp_id,
                "pem_id" => $res->emp_id,
                "status" => "0",
                "comment" => "",
                "exam_date" => "",
                "exam_time" => "",
                "order" => "0",
                "final" => "0",
                "flag" => "0",
                "send_status" => "1"
            );
            $this->db->insert('sppd_examine', $pemdata3);
            $count = 1;
            for ($i = 0; $i < count($pemeriksa); $i++) {

                if ($count == 1) {
                    $flag = 1;
                } else {
                    $flag = 0;
                }

                if ($count == count($pemeriksa)) {
                    $final = 1;
                } else {
                    $final = 0;
                }

                $pemdata = array(
                    "sppd_num" => $res->sppd_num,
                    "emp_id" => $res->emp_id,
                    "pem_id" => $pemeriksa[$i],
                    "status" => "0",
                    "comment" => "",
                    "exam_date" => "",
                    "exam_time" => "",
                    "order" => $count,
                    "final" => $final,
                    "flag" => $flag,
                    "send_status" => "1"
                );

                $this->db->insert('sppd_examine', $pemdata);

                if ($count == 1) {
                    $time = time();
                    date_default_timezone_set('Asia/Jakarta');
                    $tgl = date("Y-m-d H:i:s", $time);

                    $data5 = array(
                        "notif_desc" => "SPPD Dengan ID " . $res->sppd_id . " Perlu Diproses",
                        "notif_link" => $res->sppd_num,
                        "notif_type" => "1",
                        "date_post" => $tgl,
                        "emp_num" => $pemeriksa[$i]
                    );

                    $this->db->insert('hrms_notification', $data5);
                }

                $count++;
            }
            date_default_timezone_set("Asia/Jakarta");
            $today = date("Y-m-d H:i:s");

            $data = array(
                "sppd_num" => $res->sppd_num,
                "emp_num" => $res->emp_id,
                "comment" => 'Submit - ' . $this->input->post('komentator'),
                "date_comment" => $today
            );

            $q = $this->db->insert('sppd_comment', $data);

            if ($q && $q2) {
                return $cpt;
            } else {
                return false;
            }
        } else {

            $pemeriksa = $this->input->post('pemeriksa');
            $pemdata3 = array(
                "sppd_num" => $res->sppd_num,
                "emp_id" => $res->emp_id,
                "pem_id" => $res->emp_id,
                "status" => "0",
                "comment" => "",
                "exam_date" => "",
                "exam_time" => "",
                "order" => "0",
                "final" => "0",
                "flag" => "0",
                "send_status" => "1"
            );
            $this->db->insert('sppd_examine', $pemdata3);

            $count = 1;
            for ($i = 0; $i < count($pemeriksa); $i++) {

                if ($count == 1) {
                    $flag = 1;
                } else {
                    $flag = 0;
                }

                if ($count == count($pemeriksa)) {
                    $final = 1;
                } else {
                    $final = 0;
                }

                $pemdata = array(
                    "sppd_num" => $res->sppd_num,
                    "emp_id" => $res->emp_id,
                    "pem_id" => $pemeriksa[$i],
                    "status" => "0",
                    "comment" => "",
                    "exam_date" => "",
                    "exam_time" => "",
                    "order" => $count,
                    "final" => $final,
                    "flag" => $flag,
                    "send_status" => "0"
                );

                $this->db->insert('sppd_examine', $pemdata);
                $count++;
            }
            if ($q) {
                return true;
            } else {
                return false;
            }
        }
    }

    function get_total_perlu_proses_sppd($empnum) {
        $this->db->select("A.sppd_num,B.sppd_id,A.status,C.emp_id,C.org_code,C.job_code,B.sppd_tuj,B.sppd_tgl,C.emp_firstname,C.emp_lastname, D.emp_id as pem_id,D.emp_num as pem_num, D.emp_firstname as pem_fname, D.emp_lastname as pem_lname, D.org_code as pem_org, D.job_code as pem_job");
        $this->db->from('sppd_examine as A');
        $this->db->join('sppd_data as B', 'A.sppd_num=B.sppd_num');
        $this->db->join('hrms_employees as C', 'C.emp_num=A.emp_id');
        $this->db->join('hrms_employees as D', 'D.emp_num=B.emp_create_id');
        $this->db->where('A.pem_id', $empnum);
        $this->db->where('A.flag', '1');
        $this->db->where('B.sppd_status <>', '4');
        $this->db->where('A.send_status', '1');
        $this->db->order_by('A.sppd_num', 'DESC');
        $q = $this->db->get();
        return $q->num_rows();
    }

    /*
     * Untuk menampilkan list SPPD yang perlu di proses
     */

    function list_perlu_diproses($empnum, $num, $offset) {


        $this->db->select("A.sppd_num,B.sppd_id,A.status,C.emp_id,C.org_code,C.job_code,B.sppd_tuj,B.sppd_tgl,C.emp_firstname,C.emp_lastname, D.emp_id as pem_id,D.emp_num as pem_num, D.emp_firstname as pem_fname, D.emp_lastname as pem_lname, D.org_code as pem_org, D.job_code as pem_job");
        $this->db->from('sppd_examine as A');
        $this->db->join('sppd_data as B', 'A.sppd_num=B.sppd_num');
        $this->db->join('hrms_employees as C', 'C.emp_num=A.emp_id');
        $this->db->join('hrms_employees as D', 'D.emp_num=B.emp_create_id');
        $this->db->where('A.pem_id', $empnum);
        $this->db->where('A.flag', '1');
        $this->db->where('B.sppd_status <>', '4');
        $this->db->where('A.send_status', '1');
        if ($this->input->post('keyword') != null) {
            $key = $this->input->post('keyword');
            $this->db->like(strtolower('A.sppd_dest'), strtolower($key));
        }
        $this->db->order_by('A.sppd_num', 'DESC');
        $q = $this->db->get("", $num, $offset);
        return $q;
    }

    /*
     * Untuk menampilkan data-data yang terdapat di SPPD
     * $sppdnum : sppd number
     */

    function load_data_sppd($sppdnum) {
        $this->db->select("A.sppd_num,A.sppd_id,A.sppd_tgl,A.sppd_catt,A.temp_comment,A.sppd_dest,A.sppd_tuj,A.sppd_dsr,A.sppd_ket,A.sppd_depart,A.reserve_status,A.sppd_arrive,A.sppd_status,A.sppd_desc,B.emp_num,B.emp_id,B.emp_firstname,B.emp_lastname,B.job_code,B.org_code,C.emp_num as pem_num,C.emp_id as pem_id,C.emp_firstname as pem_fname,C.emp_lastname as pem_lname,C.job_code as pem_jobcode,C.org_code as pem_orgcode,D.job_name");
        $this->db->from('sppd_data as A');
        $this->db->join('hrms_employees as B', 'A.emp_id=B.emp_num');
        $this->db->join('hrms_employees as C', 'A.emp_create_id=C.emp_num');
        $this->db->join('hrms_job as D', 'B.emp_job=D.job_num');
        $this->db->where('A.sppd_num', $sppdnum);

        $q = $this->db->get();

        return $q;
    }

    /*
     * Menampilkan list pemeriksa dari suatu SPPD
     * $sppdnum = sppd number
     */

    function load_pemeriksa_sppd($sppdnum) {
        $this->db->select("A.emp_num,A.emp_id, A.emp_firstname,A.emp_lastname,A.job_code,A.org_code,C.job_name");
        $this->db->from("sppd_examine as B");
        $this->db->where('B.sppd_num', $sppdnum);
        $this->db->join('hrms_employees as A', 'A.emp_num=B.pem_id');
        $this->db->join('hrms_job as C', 'A.emp_job=C.job_num');
        $this->db->where('B.order <>', '0');
        $this->db->order_by('B.order', 'ASC');
        $q = $this->db->get();

        return $q;
    }

    function get_order_pemeriksa($sppdnum) {
        $this->db->select('order');
        $this->db->from('sppd_examine');
        $this->db->where('flag', '1');
        $this->db->where('final <>', '1');
        $this->db->where('sppd_num', $sppdnum);

        $order = $this->db->get();
        $q = "1";
        if ($order->num_rows() != 0) {
            $q = $order->row()->order;
        }
        return $q;
    }

    /*
     * Menampilkan komentar-komentar yang pernah ditulis oleh pemeriksa
     * atau pemohon
     * $sppdnum = sppd number
     */

    function load_comment($sppdnum) {
        $this->db->select("A.sppd_num,A.emp_num,B.emp_id,B.job_code,B.org_code,B.emp_firstname,B.emp_lastname,A.comment,A.date_comment,A.time_comment");
        $this->db->from("sppd_comment as A");
        $this->db->join("hrms_employees as B", "A.emp_num=B.emp_num");
        $this->db->where("A.sppd_num", $sppdnum);
        $this->db->order_by("A.date_comment,A.time_comment", "ASC");
        $q = $this->db->get();
        return $q;
    }

    /*
     * Mengupdate current pemeriksa sesuai dengan urutan
     */

    function upd_sppd() {
        $this->load->helper('date');
        $datestring = "%Y-%m-%d";
        $time = time();
        $tgl = mdate($datestring, $time);
        date_default_timezone_set("Asia/Jakarta");
        $jam = date("H:i:s", $time);

        $data = array(
            "status" => '1',
            "exam_date" => $tgl,
            "exam_time" => $jam,
            "flag" => '0'
        );

        $this->db->where("sppd_num", $this->input->post('sppd_num'));
        $this->db->where("pem_id", $this->input->post('pem_id'));
        $q = $this->db->update("sppd_examine", $data);

        $this->db->select("sppd_num,sppd_id,emp_id");
        $this->db->from("sppd_data");
        $this->db->where("sppd_num", $this->input->post('sppd_num'));
        $q6 = $this->db->get();
        $rowsppd = $q6->row();

        $this->load->library('upload');
        $config = array(
            'allowed_types' => 'jpg|doc|docx|pdf',
            'upload_path' => './upload/sppd-' . $rowsppd->sppd_id,
            'max_size' => 20000
        );

        $files = $_FILES;
        $cpt = count($_FILES['file-sppd']['name']);

        for ($i = 0; $i < $cpt; $i++) {

            $_FILES['userfile']['name'] = $files['file-sppd']['name'][$i];
            $_FILES['userfile']['type'] = $files['file-sppd']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['file-sppd']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $files['file-sppd']['error'][$i];
            $_FILES['userfile']['size'] = $files['file-sppd']['size'][$i];

            $this->upload->initialize($config);
            $this->upload->do_upload();
        }

        $this->db->select("order,final");
        $this->db->from("sppd_examine");
        $this->db->where("sppd_num", $this->input->post('sppd_num'));
        $this->db->where("pem_id", $this->input->post("pem_id"));
        $q = $this->db->get();
        $dat = $q->row();
        $order = $dat->order;
        $order++;

        $this->db->select("order,pem_id,emp_id");
        $this->db->from("sppd_examine");
        $this->db->where("sppd_num", $this->input->post('sppd_num'));
        $this->db->where("order", $order);
        $q = $this->db->get();
        $rowexam = $q->row();

        $this->db->select('sppd_id');
        $this->db->from('sppd_data');
        $this->db->where('sppd_num', $this->input->post('sppd_num'));
        $sppdId = $this->db->get()->row()->sppd_id;

        if ($q->num_rows() > 0) {
            $data4 = array(
                "flag" => '1'
            );
            $this->db->where("sppd_num", $this->input->post('sppd_num'));
            $this->db->where("order", $order);
            $q2 = $this->db->update("sppd_examine", $data4);
            $datestring = "%Y-%m-%d";
            $time = time();
            $tgl = mdate($datestring, $time);

            date_default_timezone_set("Asia/Jakarta");
            $date_post = date("Y-m-d H:i:s");

            $data5 = array(
                "notif_desc" => "SPPD Dengan ID " . $sppdId . " Perlu Diproses",
                "notif_link" => $this->input->post('sppd_num'),
                "notif_type" => "1",
                "date_post" => $date_post,
                "emp_num" => $rowexam->pem_id
            );

            $this->db->insert('hrms_notification', $data5);
        }

        if ($dat->final == "1") {
//            if ($this->input->post('job_code2') == 'FIA') {
            $biaya = $this->input->post('totalbiaya');
            $datestring2 = "%Y";
            $time2 = time();
            $tgl2 = mdate($datestring, $time2);

            $this->db->select("amount");
            $this->db->from('sppd_anggaran');
            $this->db->where('year', "2013");
            $amount = $this->db->get()->row()->amount;

            $sisa = $amount - $biaya;

            $datarincian = array(
                "amount" => $sisa
            );
            $this->db->where('year', "2013");
            $this->db->update('sppd_anggaran', $datarincian);
//            }

            $dta = array(
                "sppd_status" => "3"
            );

            $this->db->where("sppd_num", $this->input->post('sppd_num'));
            $q3 = $this->db->update("sppd_data", $dta);

            $this->db->select("emp_id,pem_id");
            $this->db->from("sppd_examine");
            $this->db->where("final", "1");
            $this->db->where("sppd_num", $this->input->post('sppd_num'));
            $q4 = $this->db->get()->row();

            $datestring = "%Y-%m-%d";
            $time = time();

            date_default_timezone_set("Asia/Jakarta");
            $date_post = date("Y-m-d H:i:s");

            $data5 = array(
                "notif_desc" => "SPPD Dengan ID " . $sppdId . " Telah Selesai",
                "notif_link" => $this->input->post('sppd_num'),
                "notif_type" => "2",
                "date_post" => $date_post,
                "emp_num" => $q4->emp_id
            );

            $this->db->insert('hrms_notification', $data5);
        }
        date_default_timezone_set("Asia/Jakarta");
        $today = date("Y-m-d H:i:s");

        $data = array(
            "sppd_num" => $this->input->post('sppd_num'),
            "emp_num" => $this->input->post('pem_id'),
            "comment" => 'Approve - ' . $this->input->post('komentator'),
            "date_comment" => $today
        );

        $q = $this->db->insert('sppd_comment', $data);

        if ($q || (isset($q3) && $q3)) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * Menampilkan status approval dari pemeriksa terhadap sppd
     * 
     */

    function get_approval($sppdnum) {
        $this->db->select("B.emp_num,B.emp_id,B.job_code,B.org_code,B.emp_firstname,B.emp_lastname,A.status,A.flag,C.job_name");
        $this->db->from("sppd_examine as A");
        $this->db->where("A.sppd_num", $sppdnum);
        $this->db->join("hrms_employees as B", "A.pem_id=B.emp_num");
        $this->db->join("hrms_job as C", "B.emp_job=C.job_num");
        $this->db->where('A.order <>', '0');
        $this->db->order_by("A.order", "ASC");

        $q = $this->db->get();

        return $q;
    }

    /*
     * Function untuk mengirimkan komentar yang ditulis oleh pemohon/pemeriksa sppd
     */

    function send_comment_data() {

        date_default_timezone_set("Asia/Jakarta");
        $today = date("Y-m-d H:i:s");

        $data = array(
            "sppd_num" => $this->input->post('sppdnum'),
            "emp_num" => $this->input->post('empnum'),
            "comment" => $this->input->post('isi'),
            "date_comment" => $today
        );

        $q = $this->db->insert('sppd_comment', $data);

        $this->db->select('emp_firstname,emp_lastname');
        $this->db->from('hrms_employees');
        $this->db->where('emp_num', $this->input->post('empnum'));
        $q2 = $this->db->get();
        $row = $q2->row();

        if ($q) {
            return $row;
        } else {
            return false;
        }
    }

    function get_total_telah_proses_sppd($empnum) {
        $this->db->select('A.sppd_num,A.sppd_read_stat,A.sppd_id,A.sppd_tgl,A.sppd_depart,A.sppd_arrive,A.sppd_tuj,B.emp_id,B.emp_firstname,B.emp_lastname,C.emp_id as pem_id,C.emp_firstname as pem_fname,C.emp_lastname as pem_lname');
        $this->db->from('sppd_data as A');
        $this->db->where('A.emp_id', $empnum);
        if ($this->input->post('keyword') != null) {
            $key = $this->input->post('keyword');
            $this->db->like(strtolower('A.sppd_dest'), strtolower($key));
        }

        if ($this->input->post('bulan') != "" && $this->input->post('tahun') != null) {
            $from_date = $this->input->post('tahun') . "-" . $this->input->post('bulan') . "-01";
            $to_date = $this->input->post('tahun') . "-" . $this->input->post('bulan') . "-30";
            $this->db->where('A.sppd_tgl <=', $to_date);
            $this->db->where('A.sppd_tgl >=', $from_date);
        }
        $this->db->join('hrms_employees as B', 'B.emp_num=A.emp_id');
        $this->db->join('hrms_employees as C', 'C.emp_num=A.emp_create_id');
        $this->db->where('sppd_status', 3);
        $query = $this->db->get();
        return $query->num_rows();
    }

    /*
     * Function untuk menampilkan list sppd yang telah selesai di proses
     */

    function list_telah_diproses($empnum, $num, $offset) {
        $this->db->select('A.sppd_num,A.sppd_read_stat,A.sppd_id,A.sppd_tgl,A.sppd_depart,A.sppd_arrive,A.sppd_tuj,B.emp_id,B.emp_firstname,B.emp_lastname,C.emp_id as pem_id,C.emp_firstname as pem_fname,C.emp_lastname as pem_lname');
        $this->db->from('sppd_data as A');
        $this->db->where('A.emp_id', $empnum);
        $this->db->join('hrms_employees as B', 'B.emp_num=A.emp_id');
        $this->db->join('hrms_employees as C', 'C.emp_num=A.emp_create_id');
        $this->db->where('sppd_status', 3);
        if ($this->input->post('keyword') != null) {
            $key = $this->input->post('keyword');
            $this->db->like(strtolower('A.sppd_dest'), strtolower($key));
        }

        if ($this->input->post('bulan') != "" && $this->input->post('tahun') != null) {
            $from_date = $this->input->post('tahun') . "-" . $this->input->post('bulan') . "-01";
            $to_date = $this->input->post('tahun') . "-" . $this->input->post('bulan') . "-30";
            $this->db->where('A.sppd_tgl <=', $to_date);
            $this->db->where('A.sppd_tgl >=', $from_date);
        }


        $this->db->order_by('A.sppd_num', 'desc');
        $query = $this->db->get("", $num, $offset);

        return $query;
    }

    /*
     * Function untuk memproses sppd yang di reject
     */

    function reject_sppd() {

        $this->db->select('emp_id');
        $this->db->from('hrms_user');
        $this->db->where('emp_username', $this->session->userdata('username'));

        $q = $this->db->get();
        $rowuser = $q->row();
        $emp_id = $rowuser->emp_id;

        $data = array(
            "flag" => "0"
        );

        $this->db->where('sppd_num', $this->input->post('sppd_num'));
        $this->db->where('pem_id', $emp_id);
        $this->db->update('sppd_examine', $data);


        $this->db->select('order');
        $this->db->from('sppd_examine');
        $this->db->where('sppd_num', $this->input->post('sppd_num'));
        $this->db->where('pem_id', $emp_id);
        $q2 = $this->db->get();

        date_default_timezone_set("Asia/Jakarta");
        $today = date("Y-m-d H:i:s");

        $data = array(
            "sppd_num" => $this->input->post('sppd_num'),
            "emp_num" => $emp_id,
            "comment" => 'Return - ' . $this->input->post('komentator'),
            "date_comment" => $today
        );

        $q = $this->db->insert('sppd_comment', $data);

        $rowpem = $q2->row();
        $order = $rowpem->order;

        $order--;
        $data = array(
            "flag" => "1",
            "status" => "0"
        );
        $this->db->where('order', $order);
        $this->db->where('sppd_num', $this->input->post('sppd_num'));
        $this->db->update('sppd_examine', $data);

        $this->db->select('pem_id');
        $this->db->from('sppd_examine');
        $this->db->where('sppd_num',$this->input->post('sppd_num'));
        $this->db->where('order',$order);
        $empid = $this->db->get()->row()->pem_id;
        
        $this->db->select('sppd_id');
        $this->db->from('sppd_data');
        $this->db->where('sppd_num',$this->input->post('sppd_num'));
        $sppdid = $this->db->get()->row()->sppd_id;
        
        
        $datestring = "%Y-%m-%d";
        $time = time();

        date_default_timezone_set("Asia/Jakarta");
        $date_post = date("Y-m-d H:i:s");

        $data5 = array(
            "notif_desc" => "SPPD Dengan ID " . $sppdid . " Di Return",
            "notif_link" => $this->input->post('sppd_num'),
            "notif_type" => "1",
            "date_post" => $date_post,
            "emp_num" => $empid
        );

        $this->db->insert('hrms_notification', $data5);

        return true;
    }

    function process_edit() {
        $data = array(
            "emp_id" => $this->input->post('emp_num'),
            "sppd_dest" => $this->input->post('destination'),
            "sppd_depart" => $this->input->post('depart'),
            "sppd_arrive" => $this->input->post('arrive'),
            "sppd_ket" => $this->input->post('keterangan'),
            "sppd_dsr" => $this->input->post('dasar'),
            "sppd_tuj" => $this->input->post('tujuan'),
            "sppd_catt" => $this->input->post('catt')
        );

        $this->db->where('sppd_num', $this->input->post('sppd_id'));
        $this->db->update('sppd_data', $data);


        $this->load->library('upload');
        $config = array(
            'allowed_types' => 'jpg|doc|docx|pdf',
            'upload_path' => './upload/sppd-' . $this->input->post('sppd_id_no'),
            'max_size' => 20000
        );

        $files = $_FILES;
        $cpt = count($_FILES['file_sppd']['name']);

        for ($i = 0; $i < $cpt; $i++) {

            $_FILES['userfile']['name'] = $files['file_sppd']['name'][$i];
            $_FILES['userfile']['type'] = $files['file_sppd']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['file_sppd']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $files['file_sppd']['error'][$i];
            $_FILES['userfile']['size'] = $files['file_sppd']['size'][$i];

            $this->upload->initialize($config);
            $this->upload->do_upload();
        }

        if ($this->input->post('tipe') == 1) {
            $data2 = array(
                "sppd_status" => '1'
            );

            $this->db->where('sppd_num', $this->input->post('sppd_id'));
            $this->db->update('sppd_data', $data2);

            $data3 = array(
                "send_status" => '1'
            );

            $this->db->where('sppd_num', $this->input->post('sppd_id'));
            $this->db->update('sppd_examine', $data3);

            $data4 = array(
                'flag' => '1'
            );

            $this->db->where('sppd_num', $this->input->post('sppd_id'));
            $this->db->where('order', '1');
            $this->db->update('sppd_examine', $data4);

            $this->db->select('pem_id');
            $this->db->from('sppd_examine');
            $this->db->where('order', '1');
            $this->db->where('sppd_num', $this->input->post('sppd_id'));
            $pemid = $this->db->get()->row()->pem_id;

            $this->db->select('sppd_id');
            $this->db->from('sppd_data');
            $this->db->where('sppd_num', $this->input->post('sppd_id'));
            $sppdid = $this->db->get()->row()->sppd_id;

            $time = time();
            date_default_timezone_set('Asia/Jakarta');
            $tgl = date("Y-m-d H:i:s", $time);

            $data5 = array(
                "notif_desc" => "SPPD Dengan ID " . $sppdid . " Perlu Diproses",
                "notif_link" => $this->input->post('sppd_id'),
                "notif_type" => "1",
                "date_post" => $tgl,
                "emp_num" => $pemid
            );

            $this->db->insert('hrms_notification', $data5);

            date_default_timezone_set("Asia/Jakarta");
            $today = date("Y-m-d H:i:s");

            $data = array(
                "sppd_num" => $this->input->post('sppd_id'),
                "emp_num" => $this->input->post('emp_num'),
                "comment" => 'Approve - ' . $this->input->post('komentator'),
                "date_comment" => $today
            );
            $q = $this->db->insert('sppd_comment', $data);
        }

        return true;
    }

    function tolak_sppd() {
        $sppdnum = $this->input->post('sppd_num');

        $data = array(
            "sppd_status" => "4"
        );
        $this->db->where('sppd_num', $sppdnum);
        $q = $this->db->update('sppd_data', $data);

        date_default_timezone_set("Asia/Jakarta");
        $today = date("Y-m-d H:i:s");

        $data = array(
            "sppd_num" => $sppdnum,
            "emp_num" => $this->input->post('pem_id'),
            "comment" => 'Reject - ' . $this->input->post('komentator'),
            "date_comment" => $today
        );

        $this->db->select('emp_id,sppd_id');
        $this->db->from('sppd_data');
        $this->db->where('sppd_num', $sppdnum);
        $dt = $this->db->get()->row();

        $time = time();
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d H:i:s", $time);

        $data5 = array(
            "notif_desc" => "SPPD Dengan ID " . $dt->sppd_id . " Ditolak",
            "notif_link" => $sppdnum,
            "notif_type" => "6",
            "date_post" => $tgl,
            "emp_num" => $dt->emp_id
        );

        $this->db->insert('hrms_notification', $data5);

        $q = $this->db->insert('sppd_comment', $data);


        $data2 = array(
            "status" => 2
        );
        $this->db->where('sppd_num', $sppdnum);
        $this->db->where('pem_id', $this->input->post('pem_id'));
        $q2 = $this->db->update('sppd_examine', $data2);

        if ($q && $q2) {
            return true;
        } else {
            return false;
        }
    }

    function update_sppd_by_pemeriksa() {
        $data = array(
            "emp_id" => $this->input->post('emp_num'),
            "sppd_dest" => $this->input->post('destination'),
            "sppd_depart" => $this->input->post('depart'),
            "sppd_arrive" => $this->input->post('arrive'),
            "sppd_ket" => $this->input->post('keterangan'),
            "sppd_dsr" => $this->input->post('dasar'),
            "sppd_tuj" => $this->input->post('tujuan'),
            "sppd_catt" => $this->input->post('catt')
        );

        $this->db->where('sppd_num', $this->input->post('sppd_num2'));
        $q = $this->db->update('sppd_data', $data);
        if ($q) {
            return true;
        } else {
            return false;
        }

        return $data;
    }

    function get_sisa_anggaran() {
        $this->load->helper('date');
        $datestring = "%Y";
        $time = time();
        $tgl = mdate($datestring, $time);

        $this->db->select('amount');
        $this->db->from('sppd_anggaran');
        $this->db->where('year', $tgl);
        $q = $this->db->get()->row()->amount;

        return $q;
    }

    function simpan_perincian() {
        $sppdnum = $this->input->post('sppdnum');
        $type = $this->input->post('type');
        $totalAngkutan = count($this->input->post('angkutan'));
        $namaAngkutan = $this->input->post('angkutan');
        $asal = $this->input->post('asal');
        $tujuan = $this->input->post('tujuan');
        $trfangkutan = $this->input->post('trfangkutan');
        $jml = $this->input->post('jml');

        if ($type == 1) {
            $this->db->where('sppd_num', $sppdnum);
            $this->db->delete('sppd_transport_fee');

            $this->db->where('sppd_num', $sppdnum);
            $this->db->delete('sppd_day_fee');
        }

        for ($i = 0; $i < $totalAngkutan; $i++) {
            $data = array(
                "sppd_num" => $sppdnum,
                "transport_name" => $namaAngkutan[$i],
                "from_dest" => $asal[$i],
                "to_dest" => $tujuan[$i],
                "transport_amount" => $jml[$i],
                "transport_fee" => str_replace(',', '', $trfangkutan[$i])
            );
            $this->db->insert('sppd_transport_fee', $data);
        }

        $totalHarian = count($this->input->post('tgl-berangkat'));
        $tglbrkt = $this->input->post('tgl-berangkat');
        $tglkembali = $this->input->post('tgl-kembali');
        $lama = $this->input->post('lama');
        $jharian = $this->input->post('jharian');
        $persentase = $this->input->post('persen');

        for ($j = 0; $j < $totalHarian; $j++) {
            $data2 = array(
                "sppd_num" => $sppdnum,
                "from_date" => $tglbrkt[$j],
                "to_date" => $tglkembali[$j],
                "lama" => $lama[$j],
                "percentage" => $persentase[$j],
                "day_amount" => str_replace(',', '', $jharian[$j])
            );

            $this->db->insert('sppd_day_fee', $data2);
        }
        return true;
    }

    function load_perincian_angkutan($sppdnum) {
        $this->db->select('*');
        $this->db->from('sppd_transport_fee');
        $this->db->where('sppd_num', $sppdnum);

        $q = $this->db->get();
        return $q;
    }

    function load_perincian_harian($sppdnum) {
        $this->db->select('*');
        $this->db->from('sppd_day_fee');
        $this->db->where('sppd_num', $sppdnum);

        $q = $this->db->get();
        return $q;
    }

    function load_list_lampiran($sppdnum) {
        $this->db->select('sppd_id');
        $this->db->from('sppd_data');
        $this->db->where('sppd_num', $sppdnum);
        $sppdid = $this->db->get()->row()->sppd_id;

        $this->load->helper('directory');

        $listdata = directory_map("./upload/sppd-" . $sppdid);
        return $listdata;
    }

    function get_filter_draft_sppd() {
        $keyword = $this->input->post('keyword');
    }

    function get_date_sppd($empnum) {
        $this->db->select('sppd_depart,sppd_arrive');
        $this->db->from('sppd_data');
        $this->db->where('sppd_status <>', '4');
        $this->db->where('emp_id', $empnum);
        $q = $this->db->get();

        $content = json_encode($q->result_array());
        return $content;
    }
    
    function get_year_sppd(){
        $this->db->select('YEAR("sppd_tgl")');
        $this->db->from('sppd_data');
        $q = $this->db->get();
        return $q;
    }

    function simpan_sppd() {
        $data = array(
            "temp_comment" => $this->input->post('komentator')
        );
        $this->db->where('sppd_num', $this->input->post('sppd_num'));
        $q = $this->db->update('sppd_data', $data);

        $this->load->library('upload');
        $config = array(
            'allowed_types' => 'jpg|doc|docx|pdf',
            'upload_path' => './upload/sppd-' . $this->input->post('sppd_id'),
            'max_size' => 20000
        );
        $files = $_FILES;
        $cpt = count($_FILES['file-sppd']['name']);

        for ($i = 0; $i < $cpt; $i++) {

            $_FILES['userfile']['name'] = $files['file-sppd']['name'][$i];
            $_FILES['userfile']['type'] = $files['file-sppd']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['file-sppd']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $files['file-sppd']['error'][$i];
            $_FILES['userfile']['size'] = $files['file-sppd']['size'][$i];

            $this->upload->initialize($config);
            $this->upload->do_upload();
        }

        return $q;
    }

    function load_status_sppd($sppdnum) {
        $this->db->select('emp_id');
        $this->db->from('hrms_user');
        $this->db->where('emp_username', $this->session->userdata('username'));
        $empnum = $this->db->get()->row()->emp_id;

        $this->db->select('status');
        $this->db->from('sppd_examine');
        $this->db->where('sppd_num', $sppdnum);
        $this->db->where('pem_id', $empnum);
        $stat = $this->db->get()->row()->status;

        return $stat;
    }
    
    function rekap (){
        $this->db->select('count(sppd_status) as stat');
        $this->db->from('sppd_data');
        $this->db->where('sppd_status', 3);
        $query = $this->db->get();
        return $query;
    }

    function dashboard_data (){
        $this->db->select('a.sppd_depart , b.day_amount + c.transport_fee as biaya');
        $this->db->from('sppd_data a');
        $this->db->join("sppd_day_fee as b", "a.sppd_num=b.sppd_num");
        $this->db->join("sppd_day_transport_fee as c", "a.sppd_num=c.sppd_num");
        $this->db->where('a.sppd_status', 3);
        $query = $this->db->get()->result_array();
        $q = json_encode($query);
        return $q;
    }
}
