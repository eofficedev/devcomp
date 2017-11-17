<?php
/**
* 
*/

class config extends ci_controller
{
	public $data;

	function __construct()
	{
		# code...
		parent::__construct();
        if($this->session->userdata('username')=="") die('Forbidden Access');
		  $this->data['title'] = 'Admin Config';
        $this->load->model('employee');
        $this->data['employees'] = $this->employee->get_all_emp();

        $this->load->model('admin_config');
        $this->data['config'] = $this->admin_config->load_config_data();
        $this->data['app_config'] = $this->admin_config->load_app_config();

        $username = $this->session->userdata('username');
        $this->data['result'] = $this->employee->get_detail_emp($username);
            $this->data["error"]="";
            $this->load->model("cuti/database","cuti_config",true);
            $this->cuti_config->set_table("cuti_config");
            $this->cuti_config->set_order("id asc");
            $this->data["error"]="";
            $this->load->model("cuti/database","libur_config",true);
            $this->libur_config->set_table("libur_config");
            $this->libur_config->set_order("id asc");
        $this->data["cuti_config"]=$this->cuti_config->tampil();

        $this->data["libur_config"]=$this->libur_config->tampil();
        $this->load->helper("kode");
	}
	function index(){
       $this->data['mid_content'] = 'content/cuti/konfigurasi';
       $this->load->view('includes/home_template', $this->data);

	}
    function hapus(){
        $id = $this->input->post("id");
        echo print_r($id);
        $where = "";
        if($id){
            foreach ($id as $key => $value) {
                if($where=="")
                    $where = "id = '".$value."' ";
                else
                    $where .= " or id = '".$value."'";

            }
        $this->cuti_config->set_where($where);
        $this->cuti_config->hapus();
        }
        redirect("cuti/config");

    }
    function hapus_libur(){
        $id = $this->input->post("id");
        echo print_r($id);
        $where = "";
        if($id){
            foreach ($id as $key => $value) {
                if($where=="")
                    $where = "id = '".$value."' ";
                else
                    $where .= " or id = '".$value."'";

            }
        $this->libur_config->set_where($where);
        $this->libur_config->hapus();
        }
        redirect("cuti/config");

    }
    function simpan(){
        $value["jenis"] =$this->input->post("jenis");
        $value["alokasi"]  =$this->input->post("alokasi");
        $value["hari"] =$this->input->post("hari");
        $value["sekaligus"] =$this->input->post("sekaligus");
        $value["kode"]=generateKodeCuti();
        $value["interval"]=$this->input->post("interval");
        $value["mulai_aktif"]=date("Y");
        $this->cuti_config->values=$value;
        $this->cuti_config->simpan();
        $this->data["cuti_config"]=$this->cuti_config->tampil();

       $this->data['mid_content'] = 'content/cuti/konfigurasi';
       $this->load->view('includes/home_template', $this->data);
    }
    function edit_simpan(){
        $value["jenis"] =$this->input->post("jenis");
        $value["alokasi"]  =$this->input->post("alokasi");
        $value["hari"] =$this->input->post("hari");
        $value["sekaligus"] =$this->input->post("sekaligus");
        $value["kode"]=generateKodeCuti();
        $value["interval"]=$this->input->post("interval");
        $value["mulai_aktif"]=date("Y");
        $this->cuti_config->values=$value;
        $w["id"] =$this->input->post("id");
        $this->cuti_config->set_where($w);

        $this->cuti_config->update();

        $this->cuti_config->unset_where();

        $this->data["cuti_config"]=$this->cuti_config->tampil();

       $this->data['mid_content'] = 'content/cuti/konfigurasi';
       $this->load->view('includes/home_template', $this->data);
    }
    function simpan_libur(){
        $value["nama"] =$this->input->post("nama");
        $value["tanggal_akhir"] =$this->input->post("tanggal_akhir");
        $value["tanggal_mulai"] =$this->input->post("tanggal_mulai");
        $this->libur_config->values=$value;
        $this->libur_config->simpan();
        $this->data["libur_config"]=$this->libur_config->tampil();

       $this->data['mid_content'] = 'content/cuti/konfigurasi';
       $this->load->view('includes/home_template', $this->data);
    }
}
?>