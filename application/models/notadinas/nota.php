<?php 
include_once('database.php');
class nota extends database{
	public $nota_id;
	public $creator;
	public $nota_read_status=0;
	public $nota_disposisi_num=0;
	public function __construct(){
		parent::__construct();
		$this->order = "nota_id asc";
		$this->set_table("nota_data");
	}
	public function set_values(){
		$this->values = null;
		if($this->nota_id!="")		$data['nota_id'] = $this->nota_id;
		$data["nota_perihal"] = $this->input->post("nota_perihal");
		$data["nota_isi"] = $this->input->post("nota_isi");
		$data["nota_creator_num"] = $this->creator;
		$data["nota_sender_num"] = $this->input->post("nota_sender");
		$data["nota_date"] = mysql_real_escape_string($this->input->post("nota_date"));
		$data["nota_kode_masalah"] = $this->input->post("nota_kode_masalah");
		$data["nota_disposisi_num"] =$this->nota_disposisi_num;
		$data["nota_read_status"] = $this->nota_read_status;
		$this->values = $data;
	}
}
?>