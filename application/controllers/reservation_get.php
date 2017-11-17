<?php

class Reservation_get extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function get_all_airport() {
        $keyword = $this->input->post('term');
        $data['response'] = 'false';

        $this->load->model('reservation_get2');
        $query = $this->reservation_get2->get_all_airport($keyword);

        if (!empty($query)) {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach ($query as $row) {
                $data['message'][] = array(
                    'id' => $row->id,
                    'value' => $row->name." (".$row->id.") , ".$row->city,
                    ''
                );  //Add a row to array
            }
        }
        echo json_encode($data); //echo json string if ajax request
    }

}
