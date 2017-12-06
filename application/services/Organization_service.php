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

    private $selectedId = 0;
    public function get_all_org_except($id)
    {
        $this->selectedId = $id;
        $result = $this->get_all_org('', '');
        $filtered = array_filter($result, function($o){
            return $o->org_num != $this->selectedId;
        });
        return $filtered;
    }

    // public function get_all_org_except($id)
    // {
    //     $result = $this->get_all_org('', '');
    //     $filtered = array();
    //     foreach($result as $datum){
    //         if($datum->org_num != $id ){
    //             array_push($filtered, $datum);
    //         }
    //     }
    //     return $filtered;
    // }

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

    public function add_organization($model){
        if ($this->CI == null) {
            throw new Exception('$CI instance not set! Please set it inside constructor.');
        }

        $uri = $this->CI->config->item('eoffice_base_url') . '/organizations';        
        $headers = array('Content-Type' => 'application/json');
        $response = Requests::post($uri, $headers, json_encode($model));
        return json_decode($response->body);
    }

    public function delete_organization($param){
        if ($this->CI == null) {
            throw new Exception('$CI instance not set! Please set it inside constructor.');
        }
        
        $uri = $this->CI->config->item('eoffice_base_url') . '/organizations/delete';
        $headers = array('Content-Type' => 'application/json');
        $response = Requests::post($uri, $headers, json_encode($param));
        return json_decode($response->body);
    }
}
