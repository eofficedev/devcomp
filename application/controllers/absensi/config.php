<?php 
/**
* 
*/
class config extends ci_controller
{
	public $data;
	function __construct()
	{
		parent::__construct();
		  $this->data['title'] = 'Admin Config';
        $this->load->model('employee');
        $this->data['employees'] = $this->employee->get_all_emp();

        $this->load->model('admin_config');
        $this->data['config'] = $this->admin_config->load_config_data();
        $this->data['app_config'] = $this->admin_config->load_app_config();

        $username = $this->session->userdata('username');
        $this->data['result'] = $this->employee->get_detail_emp($username);
		 $this->load->model("absensi/database","absensi_config",true);
            $this->absensi_config->set_table("absensi_config");
            $this->absensi_config->set_order("waktu_keterlambatan asc");
            $this->data["konfigurasi"]=$this->absensi_config->tampil();
        $this->data["error"]="";
        
        if($this->session->userdata('username')=="") die('Forbidden Access');
	}
	function index(){
       $this->data['mid_content'] = 'content/absensi/konfigurasi';
       $this->load->view('includes/home_template', $this->data);
	}
    function input(){
        $val["waktu_keterlambatan"] = $this->input->post("jam").":".$this->input->post("menit").":00";
        $val["waktu_pulang"] = $this->input->post("jam_pulang").":".$this->input->post("menit_pulang").":00";
        $this->absensi_config->values=$val;
        $this->absensi_config->kosong();
        $this->absensi_config->simpan();
        $this->data["error"]="Data telah di simpan!";
        $this->data["konfigurasi"]=$this->absensi_config->tampil();
        $this->index();

    }
}
?>