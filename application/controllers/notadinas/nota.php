<?php
class nota extends ci_controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("nota");
	}
	public save(){
		$this->nota->set_values();
		$this->nota->simpan();
	}
	public update(){
		$this->nota->set_values();
		$this->nota->update();
	}

}
?>