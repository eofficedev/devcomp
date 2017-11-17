<?php

class Reservation_get2 extends CI_Model {

    function get_all_airport2() {
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
        $data = $arr->pointer;
        curl_close($ch);

        foreach ($data as $row) {
            $data = array(
                "id" => $row->id,
                "name" => $row->name,
                "city" => $row->city,
                "id_country" => $row->id_country,
                "country" => $row->country,
                "latitude" => $row->latitude,
                "longitude" => $row->longitude
            );

            $this->db->insert('airport_list', $data);
        }
    }

    function get_all_country() {
        $url = "http://login.pointer.co.id/api/airport/country/format/json";
        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );

        $ch = curl_init($url);

        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        $arr = json_decode($content);
        $data = $arr->Countries;
        curl_close($ch);

        foreach ($data as $row) {
            $data = array(
                "id_country" => $row->country->id,
                "country_name" => $row->country->name
            );

            $this->db->insert('country_list', $data);
        }
    }

    function get_all_airport($keyword) {
        $this->db->select('id,name,city');
        $this->db->from('airport_list');
        $this->db->like('name', $keyword);
        $this->db->or_like('id', $keyword);
        $this->db->or_like('city', $keyword);
        $data = $this->db->get()->result();

        return $data;
    }
    
    

}
