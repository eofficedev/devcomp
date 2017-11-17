<?php 
include_once('database.php');
class nota_options extends database{
	public $nota_id;
	public $segera;
	public $return_receipt;
	public $document_options;
	public $jabatan_pengirim;
	public $nama_pengirim;
	public $nik_pengirim;
	public $unit_pengirim;
	public $kota;
	public function __construct(){
		parent::__construct();
		$this->order = "nota_id asc";
		$this->table = "nota_options";
	}
	public function set_values(){
		$this->values = null;
		$data["nota_id"]=$this->nota_id;
		$data["segera"]=$this->segera;
		$data["return_receipt"]=$this->return_receipt;
		$data["document_options"]=$this->document_options;
		$data["jabatan_pengirim"]=$this->jabatan_pengirim;
		$data["nama_pengirim"]=$this->nama_pengirim;
		$data["nik_pengirim"]=$this->nik_pengirim;
		$data["unit_pengirim"]=$this->unit_pengirim;
		$data["kota"]=$this->kota;
		$this->values = $data;
	}
}
?>