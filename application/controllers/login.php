<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("class");
        load_ci_class(APPPATH . 'services/Auth_service');
    }

    public function index()
    {
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
    public function validate_credentials()
    {
        $this->load->model('login_model');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $data['mid_content'] = 'content/login/login';
            $data['app_config'] = $this->admin_config->load_app_config();
            $this->load->view('includes/login_template', $data);
        } else {
            // $query = $this->login_model->validate();
            $query = $this->Auth_service->authenticate($this->input->post('username'), $this->input->post('password'));

            if ($query == "Ok_tetap") {
                $data = array(
                    'username' => $this->input->post('username'),
                    'is_logged_in' => true,
                    'pem_tetap' => "1"
                );

                if (!$this->input->post('remember')) {
                    $this->session->sess_expiration = 7200;
                    $this->session->sess_expire_on_close = true;
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
            } elseif ($query == "Ok") {
                $data = array(
                    'username' => $this->input->post('username'),
                    'is_logged_in' => true
                );

                if (!$this->input->post('remember')) {
                    $this->session->sess_expiration = 7200;
                    $this->session->sess_expire_on_close = true;
                }

                $this->session->set_userdata($data);
                if (!defined('BASEPATH')) {
                    define("BASEPATH", "../CodeIgniter/system/");
                }
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

    public function signout()
    {
        $this->session->sess_destroy();
        $this->index();
    }
}
