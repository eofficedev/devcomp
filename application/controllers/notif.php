<?php

class Notif extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index($id=NULL,$status=NULL) {
        if ($this->session->userdata('username') != "") {
            $data['title'] = 'Notification';
            $this->load->model('employee');

            $username = $this->session->userdata('username');
            $data['result'] = $this->employee->get_detail_emp($username);

            $dt = $data['result']->row();
            if($status!=null){
                $data['status'] = $status;
            }
            $this->load->model('notifications');
            $config['base_url'] = base_url() . 'index.php/notif/';
            $config['first_page'] = 'Awal';
            $config['last_page'] = 'Akhir';
            $config['total_rows'] = $this->notifications->get_total_notifications($dt->emp_num);
            $config['per_page'] = 4;
            $config['num_links'] = 5;
            $this->pagination->initialize($config);

            $data['notif'] = $this->notifications->get_notifications2($dt->emp_num,$config['per_page'],$id);
            $data['mid_content'] = 'content/notifications/notif_view';
            $data['app_config'] = $this->admin_config->load_app_config();
            $this->load->view('includes/home_template', $data);
        } else {
            redirect("/login");
        }
    }

    /*
     * Function untuk menghapus notification
     */

    function delete_notif() {
        $get = $this->uri->uri_to_assoc();
        $id = $get['id'];

        $this->load->model('notifications');
        $q = $this->notifications->delete($id);

        if ($q) {
            redirect('/notif');
        }
    }
    
    function clear_all_notif(){
        $this->load->model('notifications');
        $q = $this->notifications->delete_all();

        if ($q) {
            $data['status'] = "Seluruh Notifikasi Telah dihapus";
            $this->index("",$data['status']);
        }
    }

}
