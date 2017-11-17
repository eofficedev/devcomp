<?php

class Reservation_model extends CI_Model {

    function process_req() {
        $time = time();
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d H:i:s", $time);

        $data = array(
            "sppd_num" => $this->input->post('sppdnum'),
            "flight_desc" => $this->input->post('flight'),
            "time_desc" => $this->input->post('time'),
            "hotel_desc" => $this->input->post('hotel'),
            "send_date" => $tgl,
            "status" => "1"
        );
        $q = $this->db->insert('reservation_req', $data);
        $id = mysql_insert_id();
        $data2 = array(
            "reserve_status" => "1"
        );
        $this->db->where('sppd_num', $this->input->post('sppdnum'));
        $q2 = $this->db->update('sppd_data', $data2);

        $this->db->select('sppd_id');
        $this->db->from('sppd_data');
        $this->db->where('sppd_num', $this->input->post('sppdnum'));
        $sppdid = $this->db->get()->row()->sppd_id;

        $data5 = array(
            "notif_desc" => "Req Reservasi SPPD ID " . $sppdid . " Perlu Diproses",
            "notif_link" => $id,
            "notif_type" => "5",
            "date_post" => $tgl,
            "emp_num" => "2"
        );
        $this->db->insert('hrms_notification', $data5);

        if ($q && $q2) {
            return true;
        } else {
            return false;
        }
    }

    function get_all_reservation_req() {
        $this->db->select('A.req_id,A.send_date,A.sppd_num,A.flight_desc,A.time_desc,A.hotel_desc,A.status,C.emp_id,B.sppd_dest,B.sppd_depart,B.sppd_arrive,C.emp_id,C.emp_firstname,C.emp_lastname,D.job_name');
        $this->db->from('reservation_req as A');
        $this->db->where('status', '1');
        $this->db->join('sppd_data as B', 'A.sppd_num=B.sppd_num');
        $this->db->join('hrms_employees as C', 'B.emp_id = C.emp_num');
        
        $this->db->join('hrms_job as D', 'C.emp_job=D.job_num');
        $q = $this->db->get();

        return $q;
    }

    function get_all_reservation_req_selesai($num, $offset) {
        $this->db->select('A.req_id,A.send_date,A.sppd_num,A.flight_desc,A.time_desc,A.hotel_desc,A.status,C.emp_id,B.sppd_id,B.sppd_tgl,B.sppd_depart,B.sppd_arrive,B.sppd_dest,B.sppd_tuj,B.sppd_depart,B.sppd_arrive,C.emp_id,C.emp_firstname,C.emp_lastname,D.job_name');
        $this->db->from('reservation_req as A');
        $this->db->where('status', '2');
        $this->db->join('sppd_data as B', 'A.sppd_num=B.sppd_num');
        $this->db->join('hrms_employees as C', 'B.emp_id = C.emp_num');
        if ($this->input->post('keyword') != null) {
            $this->db->like(strtolower('C.emp_firstname'), strtolower($this->input->post('keyword')));
            $this->db->or_like(strtolower('C.emp_lastname'), strtolower($this->input->post('keyword')));
        }
        $this->db->join('hrms_job as D', 'C.emp_job=D.job_num');
        $q = $this->db->get("", $num, $offset);

        return $q;
    }

    function get_total_telah_diproses() {
        $this->db->select('A.req_id');
        $this->db->from('reservation_req as A');
        $this->db->join('sppd_data as B', 'A.sppd_num=B.sppd_num');
        $this->db->join('hrms_employees as C', 'B.emp_id = C.emp_num');
        if ($this->input->post('keyword') != null) {
            $this->db->like(strtolower('C.emp_firstname'), strtolower($this->input->post('keyword')));
            $this->db->or_like(strtolower('C.emp_lastname'), strtolower($this->input->post('keyword')));
        }
        $this->db->where('status', '2');
        $q = $this->db->get()->num_rows();

        return $q;
    }

    function get_total_req() {
        $this->db->select('A.req_id');
        $this->db->from('reservation_req as A');
        $this->db->where('status', '1');
        $this->db->join('sppd_data as B','B.sppd_num=A.sppd_num');
        $this->db->join('hrms_employees as C','B.emp_id=C.emp_num');
        if ($this->input->post('keyword') != null) {
            $this->db->like(strtolower('C.emp_firstname'), strtolower($this->input->post('keyword')));
            $this->db->or_like(strtolower('C.emp_lastname'), strtolower($this->input->post('keyword')));
        }
        $q = $this->db->get()->num_rows();

        return $q;
    }

    function load_request() {

        $this->db->select('A.flight_desc,A.time_desc,A.hotel_desc,B.sppd_num,B.emp_id,B.sppd_id,B.sppd_tuj,C.emp_firstname,C.emp_lastname,C.emp_email');
        $this->db->from('reservation_req as A');
        $this->db->join('sppd_data as B', 'A.sppd_num=B.sppd_num');
        $this->db->join('hrms_employees as C', 'B.emp_id=C.emp_num');
        if ($this->input->post('keyword') != null) {
            $this->db->like(strtolower('C.emp_firstname'), strtolower($this->input->post('keyword')));
            $this->db->or_like(strtolower('C.emp_lastname'), strtolower($this->input->post('keyword')));
        }
        $this->db->where('req_id', $this->input->post('req_id'));
        $q = $this->db->get();
        $row = $q->row();

        $this->db->select('telp_no');
        $this->db->from('emp_telp');
        $this->db->where('emp_num', $row->emp_id);
        $telp = $this->db->get()->row()->telp_no;

        echo $row->flight_desc . '!@#' . $row->time_desc . '!@#' . $row->hotel_desc . '!@#' . $row->sppd_id . '!@#' . $row->sppd_tuj . '!@#' . $row->emp_firstname . '!@#' . $row->emp_lastname . '!@#' . $row->emp_email . '!@#' . $telp;
    }

    function load_request_data($sppdnum) {
        $this->db->select('flight_desc,time_desc,hotel_desc,send_date');
        $this->db->from('reservation_req');
        $this->db->where('sppd_num', $sppdnum);
        $q = $this->db->get();

        return $q;
    }

    function get_web_page() {

        $url = "http://login.pointer.co.id/api/airport/get/format/json";
        $options = array(
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );

        $ch = curl_init($url);

        curl_setopt_array($ch, $options);
        $return = "";
        $content = json_decode(curl_exec($ch));

        curl_close($ch);
        return $content;
    }

    function get_web_page_2() {
        $url = "http://login.pointer.co.id/api/airlines/check/format/json";
        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => "from_city=jog&to_city=dps",
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );

        $ch = curl_init($url);

        curl_setopt_array($ch, $options);
        $return = "";
        $content = json_decode(curl_exec($ch));

        curl_close($ch);
        return $content;
    }

    function get_detail_reservation($reqid) {
        $this->db->select('D.status,A.req_id,A.flight_desc,A.time_desc,A.hotel_desc,A.send_date,B.sppd_tuj,B.sppd_dest,B.sppd_depart,B.sppd_num,C.emp_num,B.sppd_arrive,B.sppd_tgl,B.sppd_id,C.emp_id,C.emp_firstname,C.emp_lastname,C.emp_email,C.org_code,C.job_code');
        $this->db->from('reservation_req as A');
        $this->db->where('A.req_id', $reqid);
        $this->db->join('reservation_req as D', 'D.req_id=A.req_id');
        $this->db->join('sppd_data as B', 'A.sppd_num=B.sppd_num');
        $this->db->join('hrms_employees as C', 'B.emp_id=C.emp_num');

        $q = $this->db->get();
        $data['result'] = $q;
        $emp_num = $q->row()->emp_num;

        $this->db->select('telp_no');
        $this->db->from('emp_telp');
        $this->db->where('emp_num', $emp_num);
        $this->db->limit(1, 0);
        $data['telp_no'] = $this->db->get()->row()->telp_no;


        return $data;
    }

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

    function get_available_airline() {
        $url = "http://login.pointer.co.id/api/airlines/check/format/json";
        $from = $this->input->post('from_city');
        $to = $this->input->post('to_city');
        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => "from_city=" . $from . "&to_city=" . $to,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        $ch = curl_init($url);
        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        $arr = json_decode($content);
        $data = $arr->airlines;
        $content2 = json_encode($data);
        curl_close($ch);

        return $content2;
    }

    function search_flight() {
        $url = "http://login.pointer.co.id/api/flight/check/format/json";

        $airline = $this->input->post('airline');
        $from_city = $this->input->post('from_city');
        $to_city = $this->input->post('to_city');
        $tgl_flight = $this->input->post('tgl_flight');
        $jml_penumpang = $this->input->post('jml_penumpang');
        $jml_children = $this->input->post('jml_children');
        $jml_infant = $this->input->post('jml_infant');


        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => "airline=" . $airline . "&from_city=" . $from_city . "&to_city=" . $to_city . "&tgl_flight=" . $tgl_flight . "&jml_penumpang=" . $jml_penumpang . "&jml_chidren=" . $jml_children . "&jml_infant=" . $jml_infant,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );


        $ch = curl_init($url);

        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        curl_close($ch);

        return $content;
    }

    function get_build_pnr() {
        $url = "http://labs.pointer.co.id/api/hotel/buildpnr/format/json";
        $htid = $this->input->post('htid');

        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => "htid=" . $htid,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        $ch = curl_init($url);
        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        $arr = json_decode($content);
        $data = $arr->flight;
        $content2 = json_encode($data);

        curl_close($ch);

        return $content2;
    }
    
    function get_build_pnr_flight() {
        $url = "http://labs.pointer.co.id/api/hotel/buildpnr/format/json";
        $ftid = $this->input->post('ftid');

        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => "ftid=" . $ftid,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        $ch = curl_init($url);
        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        $arr = json_decode($content);
        $data = $arr->flight;
        $content2 = json_encode($data);

        curl_close($ch);

        return $content2;
    }

    function process_booking() {
        $url = "http://login.pointer.co.id/api/flight/book/format/json";

        $ftid = $this->input->post('ftid');
        $contacttitle = $this->input->post('contacttitle');
        $contactfirstname = $this->input->post('contactfirstname');
        $contactlastname = $this->input->post('contactlastname');
        $countrycode = $this->input->post('countrycode');
        $contactphone = $this->input->post('contactphone');
        $reqid = $this->input->post('reqid');
        $empnum = $this->input->post('empnum');
        $airline = $this->input->post('airline');
        $depart = $this->input->post('depart');
        $arrive = $this->input->post('arrive');
        $fromcity = $this->input->post('from_city');
        $tocity = $this->input->post('to_city');
        $sppdnum = $this->input->post('sppdnum');
        $price = $this->input->post('price');
        $flightnumber = $this->input->post('flight_number');
        $tglflight = $this->input->post('tglflight');
        $class = $this->input->post('class');
        $airline_code = $this->input->post('airline_code');
//        $options = array(
//            CURLOPT_POST => "1",
//            CURLOPT_POSTFIELDS => "ftid=" . $ftid . "&titleadlt1=" . $titleadlt . "&firstnameadlt1=" . $firstnameadlt . "&lastnameadlt1=" . $lastnameadlt . "&contacttitle=" . $contacttitle . "&contactfirstname=" . $contactfirstname . "&contactlastname=" . $contactlastname . "&countrycode=" . $countrycode . "&contactphone=" . $contactphone,
//            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
//            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
//            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
//            CURLOPT_RETURNTRANSFER => '1'
//        );
//        $ch = curl_init($url);
//
//        curl_setopt_array($ch, $options);
//
//        $content = curl_exec($ch);
//
//        curl_close($ch);
//        $data = json_decode($content);
        $booking_id = $this->generate_booking_code();
        $time = time();
        date_default_timezone_set('Asia/Jakarta');
        $today = date("Y-m-d H:i:s", $time);
        $datetime_limit = date('Y-m-d H:i:s', strtotime("+7 days"));

        $data2 = array(
            "req_id" => $reqid,
            "emp_num" => $empnum,
            "res_type" => '1',
            "booking_id" => $booking_id,
            "booking_date" => $today,
            "limit_date" => $datetime_limit,
            "status" => '1',
            "contact_title" => $contacttitle,
            "contact_firstname" => $contactfirstname,
            "contact_lastname" => $contactlastname,
            "contact_telp" => $contactphone
        );

        $this->db->insert('reservation_data', $data2);
        $idf = mysql_insert_id();
        $data4 = array(
            "flight_res_id" => $idf,
            "emp_num" => $empnum,
            "sppd_num" => $sppdnum,
            "flight_name" => $airline,
            "flight_code" => $airline_code,
            "flight_number" => $flightnumber,
            "from_city" => $fromcity,
            "to_city" => $tocity,
            "depart_date" => $tglflight,
            "arrive_date" => $tglflight,
            "class" => $class,
            "depart_time" => $depart,
            "arrive_time" => $arrive,
            "price" => $price
        );

        $this->db->insert('sppd_flight_res', $data4);

        return $idf . "!@#" . $booking_id . "!@#" . $datetime_limit;
    }

    function insert_passanger() {
        $id = $this->input->post('flight_id');

        $titleadlt = $this->input->post('titleadlt1');
        $firstnameadlt = $this->input->post('firstnameadlt1');
        $lastnameadlt = $this->input->post('lastnameadlt1');

        $i = 0;
        $j = 0;

        for ($i = 0; $i < count($titleadlt); $i++) {
            $dt = array(
                "flight_res_id" => $id,
                "pas_title" => $titleadlt[$i],
                "pas_firstname" => $firstnameadlt[$i],
                "pas_lastname" => $lastnameadlt[$i]
            );
            $this->db->insert('flight_passanger_data', $dt);
        }

        return true;
    }

    function get_list_booking($sppdnum) {
        $this->db->select("A.res_id,A.emp_num,A.res_type,A.booking_id,A.booking_date,D.confirm,A.limit_date,A.status,A.contact_title,A.contact_firstname,A.contact_lastname,A.contact_telp,D.depart_date,D.arrive_date,D.flight_name,D.depart_date,D.arrive_date,D.class,D.flight_code,D.flight_number,D.from_city,D.to_city,D.depart_time,D.arrive_time,D.price");
        $this->db->from('reservation_data as A');
        $this->db->where('A.req_id', $sppdnum);
        $this->db->join('sppd_flight_res as D', 'D.flight_res_id=A.res_id');
        $q = $this->db->get();
        return $q;
    }

    function search_hotel() {
        $country_code = $this->input->post('country_code');
        $city_code = $this->input->post('city_code');
        $hotel_name = $this->input->post('hotel_name');
        $checkin_date = $this->input->post('checkin_date');
        $checkout_date = $this->input->post('checkout_date');
        $duration = $this->input->post('lama');
        $number_of_rooms = $this->input->post('rooms');
        $adult = $this->input->post('adult');
        

        $url = "http://labs.pointer.co.id/api/hotel/searching/format/json";

        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => "country_code=".$country_code ."city_code=" . $city_code . "&hotel_name=" . $hotel_name . "&checkin_date=" . $checkin_date . "&checkout_date=" . $checkout_date . "&duration=" . $duration . "&number_of_rooms=" . $number_of_rooms . "&adult=" . $adult ,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        $ch = curl_init($url);

        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }

    function get_detail_hotel() {
        $code = $this->input->post('hotel');
        $url = "http://labs.pointer.co.id/api/hotel/detailhotel/format/json";

        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => "hotel=" . $code,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        $ch = curl_init($url);

        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }
    
    function get_booking_hotel() {
        $htid = $this->input->post('htid');
        $passenger = $this->input->post('passenger');
        $remark = $this->input->post('remark');
        
        $url = "http://labs.pointer.co.id/api/hotel/booking/format/json";

        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => "htid=" . $htid . "passenger=" . $passenger . "remark=" . $remark,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        $ch = curl_init($url);

        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }
    
    function get_search_booking() {
        $booking_date = $this->input->post('booking_date');
        $checkin_date = $this->input->post('checkin_date');
        $checkout_date = $this->input->post('checkout_date');
        $hotel_name = $this->input->post('hotel_name');
        
        $url = "http://labs.pointer.co.id/api/hotel/searchbooking/format/json";

        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => "booking_date=" . $booking_date . "checkin_date=" . $checkin_date . "checkout_date=" . $checkout_date . "hotel_name=" . $hotel_name,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        $ch = curl_init($url);

        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }
    
    function get_detail_booking() {
        $code = $this->input->post('booking_code');
        $url = "http://labs.pointer.co.id/api/hotel/detailbooking/format/json";

        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => "booking_code=" . $code,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        $ch = curl_init($url);

        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }
    
    function confirm_booking() {
        $code = $this->input->post('booking_code');
        $url = "http://labs.pointer.co.id/api/hotel/confirmbooking/format/json";

        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => "booking_code=" . $code,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        $ch = curl_init($url);

        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }
    
    function cancel_booking_hotel() {
        $code = $this->input->post('booking_code');
        $url = "http://labs.pointer.co.id/api/hotel/cancelbooking/format/json";

        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => "booking_code=" . $code,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        $ch = curl_init($url);

        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }
    
    function cancel_booking_train() {
        $code = $this->input->post('booking_code');
        $url = " http://login.pointer.co.id/api/railways/cancel/format/json";

        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => "booking_code=" . $code,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        $ch = curl_init($url);

        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }
    
    function issued_booking() {
        $code = $this->input->post('booking_code');
        $url = "http://login.pointer.co.id/api/railways/issued/format/json";

        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => "booking_code=" . $code,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        $ch = curl_init($url);

        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }
    
    function get_list_city() {
        $code = $this->input->post('id_country');
        $url = "http://labs.pointer.co.id/api/hotel/city/format/json";

        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => "id_country=" . $code,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        $ch = curl_init($url);

        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }
    
    function get_list_room_type() {

        $url = "http://labs.pointer.co.id/api/hotel/roomtype/format/json";

        $options = array(
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        $ch = curl_init($url);

        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }
    
    function get_list_station() {

        $url = "http://login.pointer.co.id/api/station/format/json";

        $options = array(
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        $ch = curl_init($url);

        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }
    
    function search_schedule_train() {
        $from_city = $this->input->post('from_city');
        $to_city = $this->input->post('to_city');
        $trip_date = $this->input->post('trip_date');
        $jml_penumpang = $this->input->post('jml_penumpang');
        $jml_children = $this->input->post('jml_children');
        $jml_infant = $this->input->post('jml_infant');
        $url = "http://login.pointer.co.id/api/railways/check/format/json";

        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => "from_city=" . $from_city . "to_city=".$to_city."trip_date=".$trip_date."jml_penumpang=".$jml_penumpang."jml_children=".$jml_children."jml_infant=".$jml_infant,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        $ch = curl_init($url);

        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }
    
    function get_seat_available() {
        $trid = $this->input->post('trid');
        $url = "http://login.pointer.co.id/api/railways/seat/format/json";

        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => "trid=" . $trid,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        $ch = curl_init($url);

        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }
    
    function get_book_issued() {
        $trid = $this->input->post('trid');
        $contactfirstname = $this->input->post('contactfirstname');
        $contactlastname = $this->input->post('contactlastname');
        $contactphone = $this->input->post('contactphone');
        $select_seat = $this->input->post('select_seat');
        $firstnameadlt1 = $this->input->post('firstnameadlt1');
        $lastnameadlt1 = $this->input->post('lastnameadlt1');
        $idnumberadlt1 = $this->input->post('idnumberadlt1');
        $birthdateadlt1 = $this->input->post('birthdateadlt1');
        $wagonadlt1 = $this->input->post('wagonadlt1');
        $seatadlt1 = $this->input->post('seatadlt1');
        $firstnamechd1 = $this->input->post('firstnamechd1');
        $lastnamechd1 = $this->input->post('lastnamechd1');
        $birthdatechd1 = $this->input->post('birthdatechd1');
        $wagonchd1 = $this->input->post('wagonchd1');
        $seatchd1 = $this->input->post('seatchd1');
        $firstnameinf1 = $this->input->post('firstnameinf1');
        $lastnameinf1 = $this->input->post('lastnameinf1');
        $birthdateinf1 = $this->input->post('birthdateinf1');
        $url = "http://login.pointer.co.id/api/railways/book/format/json";

        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => "trid=" . $trid . "contactfirstname=".$contactfirstname."contactlastname=".$contactlastname."contactphone=".$contactphone."selectseat=".$select_seat."firstnameadlt1=".$firstnameadlt1,
            "lastnameadlt1=".$lastnameadlt1."idnumberadlt1=".$idnumberadlt1."birthdateadlt1=".$birthdateadlt1."wagonadlt1=".$wagonadlt1."seatadlt1=".$seatadlt1."firstnamechd1=".$firstnamechd1."lastnamechd1=".$lastnamechd1,
            "birthdatechd1=".$birthdatechd1."wagonchd1=".$wagonchd1."seatchd1=".$seatchd1."firstnameinf1=".$firstnameinf1."lastnameinf1=".$lastnameinf1."birthdateinf1".$birthdateinf1,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        $ch = curl_init($url);

        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }

    function generate_booking_code($length = 7) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    function cancel_book() {
        $this->db->where('res_id', $this->input->post('res_id'));
        $q = $this->db->delete('reservation_data');

        return $q;
    }

    function cancel_book_by_emp($res_id) {
        $this->db->select('B.req_id,C.sppd_num');
        $this->db->from('sppd_flight_res as A');
        $this->db->where('A.flight_res_id', $res_id);
        $this->db->join('reservation_data as B', 'B.res_id=A.flight_res_id');
        $this->db->join('reservation_req as C', 'C.req_id=B.req_id');
        $q = $this->db->get()->row();

        $req = $q->req_id;
        $sppd = $q->sppd_id;

        $this->db->select('sppd_id');
        $this->db->from('sppd_data');
        $this->db->where('sppd_num', $sppd);
        $sppdid = $this->db->get()->row()->sppd_id;

        $time = time();
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d H:i:s", $time);

        $data5 = array(
            "notif_desc" => "Reservasi Airline SPPD dengan ID " . $sppdid . " di cancel",
            "notif_link" => $req,
            "notif_type" => "5",
            "date_post" => $tgl,
            "emp_num" => "2"
        );

        $this->db->insert('hrms_notification', $data5);

        $data = array(
            "confirm" => "2"
        );
        $this->db->where('flight_res_id', $res_id);
        $q3 = $this->db->update('sppd_flight_res', $data);

        return $q3;
    }

    function load_detail_reservasi($sppdnum) {
        $this->db->select('A.sppd_num,A.req_id,B.booking_id,B.limit_date,C.class,C.confirm,C.depart_date,C.flight_code,C.arrive_date,C.flight_name,C.flight_res_id as res_id,C.flight_name,C.flight_number,C.from_city,C.to_city,C.depart_time,C.arrive_time,C.price,B.contact_firstname,B.contact_lastname');
        $this->db->from('reservation_req as A');
        $this->db->where('A.sppd_num', $sppdnum);
        $this->db->join('reservation_data as B', 'B.req_id=A.req_id');
        $this->db->join('sppd_flight_res as C', 'C.flight_res_id=B.res_id');
        $this->db->where('C.confirm <>', '2');

        $q = $this->db->get();

        return $q;
    }

    function finish_req($id) {
        $data = array(
            "status" => '2'
        );

        $this->db->where('req_id', $id);
        $q = $this->db->update('reservation_req', $data);

        $this->db->select('sppd_num');
        $this->db->from('reservation_req');
        $this->db->where('req_id', $id);
        $sppdnum = $this->db->get()->row()->sppd_num;

        $this->db->select('emp_id,sppd_id');
        $this->db->from('sppd_data');
        $this->db->where('sppd_num', $sppdnum);
        $dt = $this->db->get()->row();
        $sppdid = $dt->sppd_id;
        $empid = $dt->emp_id;

        $time = time();
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d H:i:s", $time);

        $data5 = array(
            "notif_desc" => "Reservasi untuk SPPD dengan ID " . $sppdid . " Selesai",
            "notif_link" => $sppdnum,
            "notif_type" => "4",
            "date_post" => $tgl,
            "emp_num" => $empid
        );

        $q2 = $this->db->insert('hrms_notification', $data5);

        if ($q && $q2) {
            return true;
        } else {
            return false;
        }
    }

    function confirm_res() {
        $data = array(
            "confirm" => "1"
        );
        $id = $this->input->post('res_id');
        $this->db->where('flight_res_id', $id);
        $q = $this->db->update('sppd_flight_res', $data);

        if ($q) {
            return true;
        } else {
            return false;
        }
    }

    function get_reservasi($resid) {
        $this->db->select('a.flight_res_id,a.flight_name,a.flight_number,a.flight_code,a.depart_date,a.arrive_date,a.depart_time,a.arrive_time,a.from_city,a.to_city,b.booking_id');
        $this->db->from('sppd_flight_res as a');
        $this->db->where('a.flight_res_id', $resid);
        $this->db->join('reservation_data as b', 'a.flight_res_id=b.res_id');
        $q = $this->db->get('sppd_flight_res');

        return $q;
    }

    function get_list_passenger($id) {
        $this->db->select('pas_title,pas_firstname,pas_lastname');
        $this->db->from('flight_passanger_data');
        $this->db->where('flight_res_id', $id);

        return $this->db->get();
    }

    function viewbooks() {
        $kode_booking = $this->input->post('kode_booking');
        $passname = $this->input->post('passname');
        $status = $this->input->post('status');
        $date = $this->input->post('date');
        $limit = $this->input->post('limit');
        $offset = $this->input->post('offset');
        $url = "http://login.pointer.co.id/api/railways/viewbooks/format/json";

        $options = array(
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => "kode_booking=".$kode_booking."passname=".$passname."status=".$status."date=".$date."limit=".$limit."offset=".$offset,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'demo@pointer.co.id:oBZBG0worRFP',
            CURLOPT_HTTPHEADER => array('MARS-API-KEY: cce893e203a9ec54c989ec5e29559588'),
            CURLOPT_RETURNTRANSFER => '1'
        );
        $ch = curl_init($url);

        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }
}
