<?php

class Reservation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->userdata('username')=="") die('Forbidden Access');
    }

    function index() {
        phpinfo();
    }

    function flight_index() {
        if ($this->session->userdata('username') != "") {
            $data['title'] = 'Flight Reservation';
            $this->load->model('employee');
            $this->load->model('reservation_model');
            $username = $this->session->userdata('username');
            $data['result'] = $this->employee->get_detail_emp($username);
            $data['airport'] = $this->reservation_model->get_list_airport();
            $data['app_config'] = $this->admin_config->load_app_config();
            $data['mid_content'] = 'content/reservation/flight/pre_reservation';
            $this->load->view('includes/home_template', $data);
        } else {
            redirect("/login");
        }
    }

    function process_req() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->process_req();
        if ($q) {
            echo 'OK';
        }
    }

    function view_all_reservation($id=NULL) {
        if ($this->session->userdata('username') != "") {
            $data['title'] = 'All Reservation';
            $this->load->model('employee');
            $this->load->model('reservation_model');
            $username = $this->session->userdata('username');
            $data['result'] = $this->employee->get_detail_emp($username);
            $data['app_config'] = $this->admin_config->load_app_config();

            $config['base_url'] = base_url() . 'index.php/reservation/finish_reservation';
            $config['first_page'] = 'Awal';
            $config['last_page'] = 'Akhir';
            $config['total_rows'] = $this->reservation_model->get_total_req();
            $config['per_page'] = 3;
            $config['num_links'] = 3;
            $this->pagination->initialize($config);

            $data['reservation'] = $this->reservation_model->get_all_reservation_req($config['per_page'],$id);
            $data['mid_content'] = 'content/reservation/view_all_reservation';
            $this->load->view('includes/home_template', $data);
        } else {
            redirect("/login");
        }
    }

    function load_request() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->load_request();

        echo $q;
    }

    function reservation_view() {
        $get = $this->uri->uri_to_assoc();
        $id = $get['id'];

        if ($this->session->userdata('username') != "") {
            $data['title'] = 'Detail Reservasi';
            $this->load->model('employee');
            $this->load->model('reservation_model');
            $username = $this->session->userdata('username');
            $data['result'] = $this->employee->get_detail_emp($username);


            $dt = $this->reservation_model->get_detail_reservation($id);
            $data['reservation'] = $dt['result'];
            $data['telp'] = $dt['telp_no'];
            $data['booking'] = $this->reservation_model->get_list_booking($id);
//            $data['country'] = (array)$this->reservation_model->get_list_country();
            $data['mid_content'] = 'content/reservation/reservation_view';
            $data['app_config'] = $this->admin_config->load_app_config();
            $this->load->view('includes/home_template', $data);
        } else {
            redirect("/login");
        }
    }

    function get_available_airline() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->get_available_airline();

        echo $q;
    }

    function add_passanger_data() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->insert_passanger();

        if ($q) {
            redirect('/reservation/reservation_view/id/' . $this->input->post('req_id'));
        }
    }

    function get_country() {
        $this->load->model('reservation_model');
        $data['country'] = $this->reservation_model->get_list_country();

        print_r($data['country']);
    }

    function search_flight() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->search_flight();

        echo $q;
    }

    function get_list_city() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->get_list_city();
        echo $q->Cities;
    }

    function get_build_pnr_flight() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->get_build_pnr_flight();

        echo $q;
    }
    
    function get_booking_hotel() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->get_booking_hotel();

        echo $q;
    }
    
    function get_build_pnr() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->get_build_pnr();

        echo $q;
    }
    
    function process_booking() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->process_booking();

        echo $q;
    }

    function get_list_cities() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->get_list_city();

        echo $q;
    }

    function get_list_room_type() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->get_list_room_type();

        echo $q;
    }

    function search_hotel() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->search_hotel();

        echo $q;
    }

    function get_detail_hotel() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->get_detail_hotel();

        echo $q;
    }
    
    function get_detail_booking() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->get_detail_booking();

        echo $q;
    }
    
    function get_confirm_booking() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->get_confirm_booking();

        echo $q;
    }
    
    function get_cancel_booking_hotel() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->cancel_booking_hotel();

        echo $q;
    }

    function cancel_book() {
        $req_id = $this->input->post('req_id');
        $this->load->model('reservation_model');
        $q = $this->reservation_model->cancel_book();

        if ($q) {
            redirect('reservation/reservation_view/id/' . $req_id);
        }
    }

    function cancel_book_by_emp() {
        $get = $this->uri->uri_to_assoc();
        $id = $get['id'];
        $sppd = $get['sppd'];

        $this->load->model('reservation_model');
        $q = $this->reservation_model->cancel_book_by_emp($id);

        if ($q) {
            redirect('/sppd/view_telah_proses_sppd/id/' . $sppd);
        }
    }

    function finish_req() {
        $get = $this->uri->uri_to_assoc();
        $id = $get['id'];

        $this->load->model('reservation_model');
        $q = $this->reservation_model->finish_req($id);
        if ($q) {
            redirect('/reservation/view_all_reservation');
        }
    }

    function finish_reservation($id=NULL) {
        if ($this->session->userdata('username') != "") {
            $data['title'] = 'Reservasi Telah di Proses';
            $this->load->model('employee');
            $this->load->model('reservation_model');
            $username = $this->session->userdata('username');
            $data['result'] = $this->employee->get_detail_emp($username);
            $data['app_config'] = $this->admin_config->load_app_config();
            
            $config['base_url'] = base_url() . 'index.php/reservation/finish_reservation';
            $config['first_page'] = 'Awal';
            $config['last_page'] = 'Akhir';
            $config['total_rows'] = $this->reservation_model->get_total_telah_diproses();
            $config['per_page'] = 4;
            $config['num_links'] = 3;
            $this->pagination->initialize($config);
            
            $data['reservation'] = $this->reservation_model->get_all_reservation_req_selesai($config['per_page'],$id);
            $data['mid_content'] = 'content/reservation/reservasi_selesai';
            $this->load->view('includes/home_template', $data);
        } else {
            redirect("/login");
        }
    }

    function confirm_res() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->confirm_res();

        if ($q) {
            echo '1!@#Booking Berhasil Di konfirmasi';
        } else {
            echo '2!@#Booking Gagal Di konfirmasi';
        }
    }

    function print_ticket() {

        $get = $this->uri->uri_to_assoc();
        $id = $get['id'];
        $this->load->model('reservation_model');
        $data['reservation'] = $this->reservation_model->get_reservasi($id);
        $data['passanger'] = $this->reservation_model->get_list_passenger($id);
        $this->load->view('content/reservation/eticket', $data);
    }
    
    function get_list_station() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->get_list_station();

        echo $q;
    }
    
    function search_schedule_train() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->search_schedule_station();

        echo $q;
    }
    
    function get_seat_available() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->get_seat_available();

        echo $q;
    }
    
    function get_book_issued() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->get_book_issued();

        echo $q;
    }
    
    function get_cancel_booking_train() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->cancel_booking_train();

        echo $q;
    }
    
    function get_issued_booking() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->cancel_issued_booking();

        echo $q;
    }
    
    function get_viewbooks() {
        $this->load->model('reservation_model');
        $q = $this->reservation_model->viewbooks();

        echo $q;
    }
}
