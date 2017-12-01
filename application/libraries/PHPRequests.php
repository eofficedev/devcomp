<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');  

require_once APPPATH . "third_party/rmccue-Requests-87932f5/library/Requests.php";
class PHPRequests {
    public function __construct() {
       Requests::register_autoloader();
    }
}