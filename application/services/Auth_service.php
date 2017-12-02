<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_service {
    public function __construct() {
        $CI=& get_instance();
        $CI->load->library('PHPRequests');        
    }

    // public static function register_autoloader() {
	// 	spl_autoload_register(array('Requests', 'autoloader'));
	// }

    public function authenticate($username, $password){
        $uri = 'http://localhost/eoffice-webapi/public/auth';
        $data = array('username' => $username, 'password' => $password);
        $headers = array('Content-Type' => 'application/json');
        $response = Requests::post($uri, $headers, json_encode($data));
        return json_decode($response->body);
    }
}