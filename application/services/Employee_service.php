<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_service
{
    private $CI = null;
    public function __construct()
    {
        $this->CI=& get_instance();
        $this->CI->load->library('PHPRequests');
        $this->CI->config->load('eoffice_api');
    }

    public function get_all_emp($filter, $keyword)
    {
        if ($this->CI == null) {
            throw new Exception('$CI instance not set! Please set it inside constructor.');
        }
        $uri = $this->CI->config->item('eoffice_base_url') . '/employees?filter='. $filter .'&keyword='. $keyword;
        $response = Requests::get($uri);
        return json_decode($response->body);
    }

    public function get_emp_data($id)
    {
        if ($this->CI == null) {
            throw new Exception('$CI instance not set! Please set it inside constructor.');
        }
        $uri = $this->CI->config->item('eoffice_base_url') . '/employees/byid?id='. $id;
        $response = Requests::get($uri);
        return json_decode($response->body);
    }

    public function get_user_data($id){
        $data = $this->get_emp_data($id);
        return $data;
    }

    public function get_detail_emp($username)
    {
        if ($this->CI == null) {
            throw new Exception('$CI instance not set! Please set it inside constructor.');
        }
        $uri = $this->CI->config->item('eoffice_base_url') . '/employees?uname='. $username;
        $response = Requests::get($uri);
        return json_decode($response->body);
    }

    public function add_employee($model){
        if ($this->CI == null) {
            throw new Exception('$CI instance not set! Please set it inside constructor.');
        }

        print_r(json_encode($model)); return;

        $uri = $this->CI->config->item('eoffice_base_url') . '/employees';
        $headers = array('Content-Type' => 'application/json');
        $response = Requests::post($uri, $headers, json_encode($model));
        return json_decode($response->body);
    }
}