<?php

class Gaji extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if($this->session->userdata('username')=="") die('Forbidden Access');
    }
    
    function index(){
        
    }
}
