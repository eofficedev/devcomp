<?php

class Sppd extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->userdata('username')=="") die('Forbidden Access');
    }

    function index() {
        
    }

    function new_sppd($error = NULL) {

        
            $data['title'] = 'SPPD Baru';
            $data['mid_content'] = 'content/sppd/create_sppd';
            $this->load->model('employee');
            $username = $this->session->userdata('username');
            $data['result'] = $this->employee->get_detail_emp($username);

            $employee = $data['result'];
            $emp_data = $employee->row();

            $data['pemeriksa'] = $this->employee->load_pemeriksa_sppd();
            $data['list_profile'] = $this->employee->load_list_profile($emp_data->emp_num);
            $data['app_config'] = $this->admin_config->load_app_config();
            $data['all_atasan'] = $this->employee->get_all_atasan();
            $data['all_atasan_pmh'] = $this->employee->get_all_atasan_pmh();
            $data['error'] = $error;
            $data['fiatur'] = $this->employee->get_fiatur_by_org($emp_data->org_id);
            if ($data['fiatur']->num_rows() == 0) {
                echo "<script>alert(\"Belum Ada Fiatur di Organisasi ini, ".$emp_data->org_id."mohon hubungi Admin\"); location='/eoffice'</script>";
                //redirect('site');
            } else {
                $this->load->view('includes/home_template', $data);
            }
          
        }
    

    function proses_sppd($id = NULL, $status = NULL) {
        $data['title'] = 'SPPD Sedang Diproses';
        $data['mid_content'] = 'content/sppd/sedang_proses_sppd';
        $this->load->model('employee');
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $row = $data['result']->row();
        $empId = $row->emp_num;

        $this->load->model('sppds');
        $config['base_url'] = base_url() . 'index.php/sppd/proses_sppd';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['total_rows'] = $this->sppds->get_total_proses_sppd($empId);

        $config['per_page'] = 4;
        $config['num_links'] = 1;
        $this->pagination->initialize($config);


        $dt['sppd_list'] = $this->sppds->get_proses_sppd($empId, $config['per_page'], $id);
        $data['sppd_list'] = $dt['sppd_list']['proses_sppd'];
        $data['sppd_tolak'] = $dt['sppd_list']['reject_sppd'];
        $data['app_config'] = $this->admin_config->load_app_config();
        if (isset($status)) {
            $data['status'] = $status;
        }
        
        
        $this->load->view('includes/home_template', $data);
    }

    function perlu_proses_sppd($id = NULL,$stat=NULL) {

        $data['title'] = 'SPPD Perlu Diproses';
        $data['mid_content'] = 'content/sppd/perlu_proses_sppd';
        $this->load->model('employee');
        $this->load->model('sppds');
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $row = $data['result']->row();
        $empId = $row->emp_num;

        $config['base_url'] = base_url() . 'index.php/sppd/perlu_proses_sppd';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['total_rows'] = $this->sppds->get_total_perlu_proses_sppd($empId);
        $config['per_page'] = 4;
        $config['num_links'] = 5;
        $this->pagination->initialize($config);

        $data['sppd_list'] = $this->sppds->list_perlu_diproses($empId, $config['per_page'], $id);

        $data['app_config'] = $this->admin_config->load_app_config();
        $this->load->view('includes/home_template', $data);
    }

    function draft_sppd($id = NULL, $status = NULL) {
        $data['title'] = 'SPPD Draft';
        $data['mid_content'] = 'content/sppd/draft_sppd';
        $this->load->model('employee');
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $row = $data['result']->row();
        $empId = $row->emp_num;

        $this->load->model('sppds');

        $config['base_url'] = base_url() . 'index.php/sppd/draft_sppd';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['total_rows'] = $this->sppds->get_total_draft_sppd($empId);
        $config['per_page'] = 4;
        $config['num_links'] = 5;
        $this->pagination->initialize($config);
        $data['draft'] = $this->sppds->get_draft_sppd($empId, $config['per_page'], $id);
        $data['key'] = "All";

        if ($this->input->post('keyword')) {
            $data['key'] = $this->input->post('keyword');
        }

        $data['links'] = $this->pagination->create_links();
        $data['app_config'] = $this->admin_config->load_app_config();
        if (isset($status)) {
            if($status==1){
                $data['status'] = "SPPD Berhasil dihapus";
            }
            else {
                if($status==2){
                    $data['status'] = "SPPD Berhasil di submit";
                }
                else {
                    $data['status'] = "SPPD Berhasil disimpan";
                }
            }
        }

        $this->load->view('includes/home_template', $data);
    }

    function hapus() {
        $get = $this->uri->uri_to_assoc();
        $sppdId = $get['id'];

        $this->load->model('sppds');
        $q = $this->sppds->remove($sppdId);

        if ($q) {
            redirect('/sppd/draft_sppd/stat//1');
        }
    }

    function edit() {
        $get = $this->uri->uri_to_assoc();
        $sppdId = $get['id'];
        $this->load->model('sppds');

        $data['data_sppd'] = $this->sppds->load_data_sppd($sppdId);
        $data['data_komentar'] = $this->sppds->load_comment($sppdId);
        $data['pemeriksa'] = $this->sppds->load_pemeriksa_sppd($sppdId);

        $data['title'] = 'View SPPD';
        $data['mid_content'] = 'content/sppd/edit_sppd';

        $this->load->model('employee');
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $data['app_config'] = $this->admin_config->load_app_config();
        $data['lampiran'] = $this->sppds->load_list_lampiran($sppdId);
        $this->load->view('includes/home_template', $data);
    }

    function show_exam() {
        $data['title'] = 'Pilih Pemeriksa';
        $this->load->model('employee');
        $username = $this->session->userdata('username');


        if ($this->input->post('keyword') == null || $this->input->post('keyword') == "") {
            $query = $this->employee->get_detail_emp($username);
            $res = $query->row();
            $mgrId = 0;
            $arrdata = array();
            $data['all_atasan'] = $this->employee->get_all_atasan($mgrId, $arrdata, 0);
        } else {
            $data['all_atasan'] = $this->employee->get_emp_byname($this->input->post('keyword'));
        }

        $this->load->view('content/sppd/pilih_pemeriksa_sppd', $data);
    }

    function process() {

        $this->form_validation->set_rules('destination', 'Destination', 'trim|required');
        $this->form_validation->set_rules('depart', 'Depart Date', 'trim|required');
        $this->form_validation->set_rules('arrive', 'Arrive Date', 'trim|required');
        $this->form_validation->set_rules('dasar', 'Dasar Perjalanan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('tujuan', 'Tujuan Perjalanan', 'trim|required');
        $this->form_validation->set_rules('catt', 'Catatan', 'trim|required');


        if ($this->form_validation->run() != FALSE) {
            $this->load->model('sppds');
            $q = $this->sppds->add_new_sppd();

//            echo $q;
            if ($q) {
                if ($this->input->post('tipe') == '2') {
                    $data['status'] = "SPPD telah disimpan";
                    $this->draft_sppd(null, $data['status']);
                } else {
                    $data['status'] = "SPPD Berhasil di Submit";
                    $this->proses_sppd(null, $data['status']);
                }
            } else {
                redirect('/sppd/new_sppd');
            }
        } else {
            $data['error'] = 'Error';
            $this->new_sppd($data['error']);
        }
    }

    function view_sppd() {
        $get = $this->uri->uri_to_assoc();
        $sppdId = $get['id'];
        $this->load->model('sppds');

        $data['data_sppd'] = $this->sppds->load_data_sppd($sppdId);
        $data['data_komentar'] = $this->sppds->load_comment($sppdId);
        $data['pemeriksa'] = $this->sppds->load_pemeriksa_sppd($sppdId);
        $data['status_pemeriksa'] = $this->sppds->load_status_sppd($sppdId);
        $data['order'] = $this->sppds->get_order_pemeriksa($sppdId);
        $data['title'] = 'View SPPD';
        $data['mid_content'] = 'content/sppd/view_sppd';

        $this->load->model('employee');
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $data['anggaran'] = $this->sppds->get_sisa_anggaran();
        $data['rincian_angkutan'] = $this->sppds->load_perincian_angkutan($sppdId);
        $data['rincian_harian'] = $this->sppds->load_perincian_harian($sppdId);
        $data['lampiran'] = $this->sppds->load_list_lampiran($sppdId);


        $data['app_config'] = $this->admin_config->load_app_config();
        $this->load->view('includes/home_template', $data);
    }

    function approve_sppd() {
        $this->load->model('sppds');
        $q = $this->sppds->upd_sppd();

        if ($q) {
            redirect("/sppd/perlu_proses_sppd");
        }
    }

    function view_sedang_proses_sppd() {
        $get = $this->uri->uri_to_assoc();
        $sppdId = $get['id'];
        $this->load->model('sppds');

        $data['data_sppd'] = $this->sppds->load_data_sppd($sppdId);
        $data['data_komentar'] = $this->sppds->load_comment($sppdId);
        $data['title'] = 'View SPPD Sedang Diproses';
        $data['mid_content'] = 'content/sppd/sedang_proses_sppd_view';
        $this->load->model('employee');
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $employee = $data['result'];
        $data['lampiran'] = $this->sppds->load_list_lampiran($sppdId);

        $data['approval_prg'] = $this->sppds->get_approval($sppdId);
        $data['app_config'] = $this->admin_config->load_app_config();
        $this->load->view("includes/home_template", $data);
    }

    function view_telah_proses_sppd() {
        $get = $this->uri->uri_to_assoc();
        $sppdId = $get['id'];
        $this->load->model('sppds');
        $this->load->model('reservation_model');

        $data['data_sppd'] = $this->sppds->load_data_sppd($sppdId);
        $data['data_komentar'] = $this->sppds->load_comment($sppdId);
        $data['title'] = 'View SPPD Sedang Diproses';
        $data['mid_content'] = 'content/sppd/telah_proses_sppd_view';
        $this->load->model('employee');
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $data['rservation_detail'] = $this->reservation_model->load_request_data($sppdId);
        $data['app_config'] = $this->admin_config->load_app_config();
        $employee = $data['result'];
        $data['rincian_angkutan'] = $this->sppds->load_perincian_angkutan($sppdId);
        $data['rincian_harian'] = $this->sppds->load_perincian_harian($sppdId);
        $data['rincian_reservasi'] = $this->reservation_model->load_detail_reservasi($sppdId);

        $data['approval_prg'] = $this->sppds->get_approval($sppdId);

        $this->load->view("includes/home_template", $data);
    }

    function send_comment() {
        $this->load->model('sppds');
        $this->load->helper('date');

        date_default_timezone_set("Asia/Jakarta");
        $today = date("Y-m-d H:i:s");
        $q = $this->sppds->send_comment_data();

        if ($q) {
            echo $today . " - " . $q->emp_firstname . " " . $q->emp_lastname . " - <i>" . $this->input->post('isi') . "</i>";
        }
    }

    function show_emp() {
        $data['title'] = 'Pilih Pemeriksa';
        $this->load->model('employee');
        $username = $this->session->userdata('username');

        if ($this->input->post('keyword') == null || $this->input->post('keyword') == "") {
            $query = $this->employee->get_detail_emp($username);
            $res = $query->row();
            $mgrId = 0;
            $arrdata = array();
            $data['all_atasan'] = $this->employee->get_all_atasan($mgrId, $arrdata, 0);
        } else {
            $data['all_atasan'] = $this->employee->get_emp_byname($this->input->post('keyword'));
        }

        $this->load->view('content/sppd/pilih_pemeriksa', $data);
    }

    function telah_proses_sppd($id = NULL) {
        $data['title'] = 'SPPD Perlu Diproses';
        $data['mid_content'] = 'content/sppd/telah_proses_sppd';
        $this->load->model('employee');
        $this->load->model('sppds');
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $row = $data['result']->row();
        $empId = $row->emp_num;

        $config['base_url'] = base_url() . 'index.php/sppd/telah_proses_sppd';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['total_rows'] = $this->sppds->get_total_telah_proses_sppd($empId);
        $config['per_page'] = 4;
        $config['num_links'] = 5;
        $this->pagination->initialize($config);

        $data['sppd_list'] = $this->sppds->list_telah_diproses($empId, $config['per_page'], $id);
        $data['app_config'] = $this->admin_config->load_app_config();
        $this->load->view('includes/home_template', $data);
    }

    function reject_sppd() {
        $this->load->model('sppds');
        $q = $this->sppds->reject_sppd();

        if ($q) {
            redirect('/sppd/perlu_proses_sppd');
        }
    }

    function edit_sppd_by_pemeriksa() {
        $get = $this->uri->uri_to_assoc();
        $sppdId = $get['id'];
        $this->load->model('sppds');

        $data['data_sppd'] = $this->sppds->load_data_sppd($sppdId);
        $data['data_komentar'] = $this->sppds->load_comment($sppdId);
        $data['pemeriksa'] = $this->sppds->load_pemeriksa_sppd($sppdId);

        $data['title'] = 'View SPPD';
        $data['mid_content'] = 'content/sppd/edit_sppd_by_pemeriksa';

        $this->load->model('employee');
        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $data['app_config'] = $this->admin_config->load_app_config();
        $this->load->view('includes/home_template', $data);
    }

    function process_edit() {
        $this->form_validation->set_rules('destination', 'Destination', 'trim|required');
        $this->form_validation->set_rules('depart', 'Depart Date', 'trim|required');
        $this->form_validation->set_rules('arrive', 'Arrive Date', 'trim|required');
        $this->form_validation->set_rules('dasar', 'Dasar Perjalanan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('tujuan', 'Tujuan Perjalanan', 'trim|required');
        $this->form_validation->set_rules('catt', 'Catatan', 'trim|required');

        if ($this->form_validation->run() != FALSE) {
            $this->load->model('sppds');
            $q = $this->sppds->process_edit();

            if ($q) {
                if($this->input->post('tipe')==2){
                    redirect('/sppd/draft_sppd/stat//3');
                }
                else {
                    redirect('/sppd/draft_sppd/stat//2');
                }
                
            }
        }
    }

    function tolak_sppd() {
        $this->load->model('sppds');
        $q = $this->sppds->tolak_sppd();

        if ($q) {
            redirect('/sppd/perlu_proses_sppd');
        }
    }

    function process_update() {
        $sppdnum = $this->input->post('sppd_num2');

        $this->form_validation->set_rules('destination', 'Destination', 'trim|required');
        $this->form_validation->set_rules('depart', 'Depart Date', 'trim|required');
        $this->form_validation->set_rules('arrive', 'Arrive Date', 'trim|required');
        $this->form_validation->set_rules('dasar', 'Dasar Perjalanan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('tujuan', 'Tujuan Perjalanan', 'trim|required');
        $this->form_validation->set_rules('catt', 'Catatan', 'trim|required');

        if ($this->form_validation->run() != FALSE) {
            $this->load->model('sppds');
            $q = $this->sppds->update_sppd_by_pemeriksa();

            if ($q) {
                redirect('/sppd/view_sppd/id/' . $sppdnum);
            }
        } else {
            $this->load->model('sppds');
            $data['data_sppd'] = $this->sppds->load_data_sppd($sppdnum);
            $data['data_komentar'] = $this->sppds->load_comment($sppdnum);
            $data['pemeriksa'] = $this->sppds->load_pemeriksa_sppd($sppdnum);
            $data['error'] = "Error";
            $data['title'] = 'View SPPD';
            $data['mid_content'] = 'content/sppd/edit_sppd_by_pemeriksa';

            $this->load->model('employee');
            $username = $this->session->userdata('username');
            $data['result'] = $this->employee->get_detail_emp($username);
            $data['app_config'] = $this->admin_config->load_app_config();
            $this->load->view('includes/home_template', $data);
        }
    }

    function view_form_perincian_biaya() {

        $this->load->view('content/sppd/form_perincian_biaya');
    }

    function simpan_perincian() {
        $this->load->model('sppds');
        $sppdnum = $this->input->post('sppdnum');
        $q = $this->sppds->simpan_perincian();

        if ($q) {
            redirect('/sppd/view_sppd/id/' . $sppdnum);
        }
    }

    function get_file() {
        $this->load->helper('file');
        $this->load->helper('download');
        $get = $this->uri->uri_to_assoc();
        $sppdid = $get['id'];
        $filename = $get['filename'];

        $file = './upload/sppd-' . $sppdid . '/' . $filename;

        force_download($file, read_file($file));
    }

    function get_filter_draft_sppd() {
        $this->load->model('sppds');
        $q = $this->sppds->get_filter_draft_sppd();

        echo $q;
    }

    function get_date_sppd() {
        $empnum = $this->input->post('emp_num');
        $this->load->model('sppds');
        $q = $this->sppds->get_date_sppd($empnum);

        echo $q;
    }

    function simpan_sppd() {
        $this->load->model('sppds');
        $q = $this->sppds->simpan_sppd();

        if ($q) {
            $data['status'] = "SPPD Berhasil Disimpan";
            $this->perlu_proses_sppd(null, $data['status']);
        }
    }

    function print_sppd($id = NULL) {
        $this->load->model('sppds');
        $this->load->model('organization');
        $data['detail_sppd'] = $this->sppds->load_data_sppd($id);
        $data['pemeriksa'] = $this->sppds->load_pemeriksa_sppd($id);
        $data['anggaran'] = $this->sppds->get_sisa_anggaran();
        $data['org_name'] = $this->organization->get_first_org();
        $data['rincian_angkutan'] = $this->sppds->load_perincian_angkutan($id);
        $data['rincian_harian'] = $this->sppds->load_perincian_harian($id);

        $this->load->view('content/sppd/sppd_print_view', $data);
    }

    function print_chart (){
        $this->load->model('sppds');
        $q =  $this->sppds->dashboard_data();
        echo $q;
    }
}
