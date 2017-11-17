<?php 
class config extends ci_controller{
	function __construct()
	{
		parent::__construct();
        if($this->session->userdata('username')=="") die('Forbidden Access');
		  $this->data['title'] = 'Email Config';
        $this->load->model('employee');
        $this->data['employees'] = $this->employee->get_all_emp();

        $this->load->model('admin_config');
        $this->data['config'] = $this->admin_config->load_config_data();
        $this->data['app_config'] = $this->admin_config->load_app_config();

        $username = $this->session->userdata('username');
        $this->data['result'] = $this->employee->get_detail_emp($username);
            $this->data["error"]="";
       
	}
	function index(){
		$file ="././email/config/config.inc.php";
		include_once($file);
		$this->data["konfigurasi"] = $config;
		$this->data['mid_content'] = 'content/email/konfigurasi';
        $this->load->view('includes/home_template', $this->data);

	}
	function simpan(){
		$file ="././email/config/config.inc.php";
		include_once($file);
		$searchF  = $config;
		$config['default_host'] = $this->input->post("imap_server");
		$config['default_port'] = $this->input->post("imap_port");
		$config['smtp_server'] =  $this->input->post("smtp_server");
		$config['smtp_port'] = $this->input->post("smtp_port");
		$h = array();
		$i=0;
		foreach ($config as $key => $value) {
			array_push($h, '$config{"'.$key.'"}="'.$value.'";');
			
		}
		for($i=0;$i<count($h);$i++){
			$h[$i]=str_replace("{", "[", $h[$i]);
			$h[$i]=str_replace("}", "]", $h[$i]);

		}
		$h = implode("
			", $h);
		$h = "<?php 
		".$h;
		$fh = fopen($file, 'w');
		fwrite($fh, $h);
		redirect("email/config/index");
	}

}

?>