<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_service
{
    private $CI = null;
    public function __construct()
    {
        $this->CI=& get_instance();
        $this->CI->load->library('PHPRequests');
        $this->CI->config->load('eoffice_api');
    }


    // public static function register_autoloader() {
    // 	spl_autoload_register(array('Requests', 'autoloader'));
    // }

    public function authenticate($username, $password)
    {
        if ($this->CI == null) {
            throw new Exception('$CI instance not set! Please set it inside constructor.');
        }
        $uri = $this->CI->config->item('eoffice_base_url') . '/auth';
        $data = array('username' => $username, 'password' => $password);
        $headers = array('Content-Type' => 'application/json');
        $response = Requests::post($uri, $headers, json_encode($data));
        return json_decode($response->body);
    }
}
