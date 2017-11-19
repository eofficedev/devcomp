<?php 
include_once('database.php');
class nota_informasi_dash extends database{
	public function __construct(){
		parent::__construct();
		$this->order = "nota_id asc";
		$this->set_table("view_nota_informasi_dash");
	}
	public function get_values(){
		$temp = $this->tampil();
		$result = [];
		$prev_nota_id = 0;
		foreach($temp as $row){
			if($row->nota_id != $prev_nota_id){
				$row->tujuan_name = [];
				$row->tujuan_email = [];
				array_push($result, $row);
				$prev_nota_id = $row->nota_id;
			}
		}

		foreach($temp as $row){
			foreach($result as $res){
				if($row->nota_id == $res->nota_id){
					array_push($res->tujuan_name, $row->receiver_name);
					array_push($res->tujuan_email, $row->receiver_email);
				}
			}
		}
		return $result;
	}
}
?>