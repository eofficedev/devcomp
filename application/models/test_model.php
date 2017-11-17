<?php

class Test_model extends CI_Model {
    
    function get_list_airport() {

        $url = "http://login.pointer.co.id/api/airport/get/format/json";
        $options = array(
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        
        $ch = curl_init($url);
        
        curl_setopt_array($ch, $options);
        
        $content = curl_exec($ch);
        $arr = json_decode($content);
        curl_close($ch);
        
        return $arr;
    }
}
