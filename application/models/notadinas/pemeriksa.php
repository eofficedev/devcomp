<?php 
include_once('database.php');
class pemeriksa extends database{
	
	public $nota_id;
	public $examiner_id;
	public $exam_queue;
	public $exam_date;
	public $ok_status = 0;
	public $return_status = 0;
	public $reject_status = 0;
	public $read_status = 0;
	public $sent_status = 0;
	public $status= "TIDAK AKTIF";
	public function __construct(){
		parent::__construct();
		$this->order = "exam_queue asc";
		$this->table = "nota_examine";
	}
	public function get_all_atasan($emp_num){
		$this->load->model("notadinas/database","custom",true);
		$this->load->model("notadinas/database","employ",true);
		$berhenti = false;
		$this->order = "emp_num asc";
		$this->table = "view_nota_employees";
		$where=array("emp_num" => $emp_num);
		$this->set_where($where);
		$data = $this->tampil();
		$org_num = $data[0]->org_num;
		$w = "";
		while(!$berhenti){
			$where = array("org_num"=>$org_num);
			$this->custom->table = "hrms_organization";
			$this->custom->set_where($where);
			$this->custom->set_order("org_num asc");
			$data = $this->custom->tampil();
			if($w=="")
				$w = "org_num ='".$org_num."'";
			else
				$w = $w." or org_num ='".$org_num."'";
			if($data[0]->org_sub!=null)
				$org_num = $data[0]->org_sub;
			else 
				$berhenti = true;
		}
		
		$this->employ->table = "view_nota_employees";
		
		$this->employ->set_where($w);
		$this->employ->set_order("org_num asc");
		return $this->employ->tampil();
	}
	public function get_all_atasan_json($emp_num,$jabatan=null,$nama=null){
		$this->load->model("notadinas/database","custom",true);
		$this->load->model("notadinas/database","employ",true);
		$berhenti = false;
		$this->order = "emp_num asc";
		$this->table = "view_nota_employees";
		$where=array("emp_num" => $emp_num);
		$this->set_where($where);
		$data = $this->tampil();
		$org_num = $data[0]->org_num;
		$w = "";
		while(!$berhenti){
			$where = array("org_num"=>$org_num);
			$this->custom->table = "hrms_organization";
			$this->custom->set_where($where);
			$this->custom->set_order("org_num asc");
			$data = $this->custom->tampil();
			if($w=="")
				$w = "org_num ='".$org_num."'";
			else
				$w = $w." or org_num ='".$org_num."'";
			if($data[0]->org_sub!=null)
				$org_num = $data[0]->org_sub;
			else 
				$berhenti = true;
		}
		if($jabatan != null){
			$w = "(job_name like '%".$jabatan."%') and"."(".$w.")";
		}
		if($nama != null){
			$w = "(emp_firstname like '%".$nama."%' or emp_lastname like '%".$nama."%' ) and"."(".$w.")";
		}
		$this->employ->table = "view_nota_employees";
		
		$this->employ->set_where($w);
		$this->employ->set_order("org_num asc");
		return $this->employ->tampil_json();
	}
	public function set_values(){
		$data["nota_id"] = $this->nota_id;
		$data["examiner_id"] = $this->examiner_id;
		$data["exam_queue"]=$this->exam_queue;
		$data["exam_date"]=date("Y-m-d");
		$data["ok_status"]=$this->ok_status;
		$data["return_status"]=$this->return_status;
		$data["reject_status"]=$this->reject_status;
		$data["read_status"]=$this->read_status;
		$data["sent_status"]=$this->sent_status;
		$data["status"]=$this->status;
		$this->values = $data;
	}
	public function set_status($stat,$val){
		if($stat=="ok"){
			$data["ok_status"]=$val;
			$data["reject_status"]=0;
			$data["return_status"]=0;
		}
		else if($stat=="reject"){
			$data["ok_status"]=0;
			$data["return_status"]=0;
			$data["reject_status"]=$val;
		}
		else if($stat=="return"){
			$data["ok_status"]=0;
			$data["return_status"]=$val;
			$data["reject_status"]=0;
		}
		$this->values = $data;
		$this->update();
	}
}
?>