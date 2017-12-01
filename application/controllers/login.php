<?php
class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('PHPRequests');        
    }

    function index() {
        if ($this->session->userdata('username') != null) {
            redirect('/site');
        } else {
            $data['title'] = 'Login';
            $data['mid_content'] = 'content/login/login';
            $data['app_config'] = $this->admin_config->load_app_config();
            $this->load->view('includes/login_template', $data);
        }
    }

    /*
     * function untuk memvalidasi credential login
     */

    function validate_credentials() {
        // $response = Requests::get('https://github.com/events');
        // var_dump($response->body);
        // return;

        $this->load->model('login_model');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login';
            $data['mid_content'] = 'content/login/login';
            $data['app_config'] = $this->admin_config->load_app_config();
            $this->load->view('includes/login_template', $data);
        } else {
            $query = $this->login_model->validate();
            if ($query == "Ok_tetap") {
                $data = array(
                    'username' => $this->input->post('username'),
                    'is_logged_in' => TRUE,
                    'pem_tetap' => "1"
                );


                if (!$this->input->post('remember')) {
                    $this->session->sess_expiration = 7200;
                    $this->session->sess_expire_on_close = TRUE;
                }

                $this->session->set_userdata($data);

                if ($this->input->post('username') == "admin") {
                    redirect('site/admin_index');
                } else {
                    if ($this->input->post('username') == "reservation") {
                        redirect('site/home_reservation');
                    } else {
                        redirect('site/index');
                    }
                }
            } else {
                if ($query == "Ok") {
                    $data = array(
                        'username' => $this->input->post('username'),
                        'is_logged_in' => TRUE
                    );

                    if (!$this->input->post('remember')) {
                        $this->session->sess_expiration = 7200;
                        $this->session->sess_expire_on_close = TRUE;
                    }

                    $this->session->set_userdata($data);
                    if (!defined('BASEPATH'))
                        define("BASEPATH", "../CodeIgniter/system/");
                    if ($this->input->post('username') == "admin") {
                        redirect('site/admin_index');
                    } else {
                        if ($this->input->post('username') == "reservation") {
                            redirect('site/home_reservation');
                        } else {
                            redirect('site/index');
                        }
                    }
                } else {
                    $data['title'] = 'Login';
                    $data['mid_content'] = 'content/login/login';
                    $data['error'] = "Username atau Password Salah";
                    $data['app_config'] = $this->admin_config->load_app_config();
                    $this->load->view('includes/login_template', $data);
                }
            }
        }
    }

    function signout() {
        $this->session->sess_destroy();
        $this->index();
    }

}