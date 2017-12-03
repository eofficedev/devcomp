<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Organization_service
{
    private $CI = null;
    public function __construct()
    {
        $this->CI=& get_instance();
        $this->CI->load->library('PHPRequests');
        $this->CI->config->load('eoffice_api');
    }

    public function get_all_org($filter, $keyword)
    {
        if ($this->CI == null) {
            throw new Exception('$CI instance not set! Please set it inside constructor.');
        }
        $uri = $this->CI->config->item('eoffice_base_url') . '/organizations?filter='. $filter .'&keyword='. $keyword;
        $response = Requests::get($uri);
        return json_decode($response->body);
    }

    public function get_byid_org($id)
    {
        if ($this->CI == null) {
            throw new Exception('$CI instance not set! Please set it inside constructor.');
        }
        $uri = $this->CI->config->item('eoffice_base_url') . '/organizations/byid?id='. $id;        
        $response = Requests::get($uri);
        return json_decode($response->body);
    }

    public function upd_organization($model){
        if ($this->CI == null) {
            throw new Exception('$CI instance not set! Please set it inside constructor.');
        }
        $uri = $this->CI->config->item('eoffice_base_url') . '/organizations';        
        $headers = array('Content-Type' => 'application/json');
        $response = Requests::put($uri, $headers, json_encode($model));
        return json_decode($response->body);
    }
}
