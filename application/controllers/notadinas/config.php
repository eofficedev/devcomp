<?php 
	/**
	* 
	*/
	class config extends ci_controller
	{
		
		function __construct()
		{
			parent::__construct();
        if($this->session->userdata('username')=="") die('Forbidden Access');
			$this->load->model("notadinas/nota_config","nota_config",true);
		}
		function index(){
			$this->show_config();
		}
		function save(){
			$data = $_POST;
			$where ="urutan like '%%'";
			$this->nota_config->set_where($where);
			$this->nota_config->hapus();
			for ($i=0;$i<count($data["field"]);$i++) {
				$this->nota_config->urutan = $i;
				$this->nota_config->tipe = $data["field"][$i];
				$this->nota_config->value = $data["value"][$i];
				$this->nota_config->skip_delimiter = $data["skip_delimiter"][$i];
				$this->nota_config->set_values();
				$this->nota_config->simpan();
			}	
			$this->show_config();
		}
		function show_config(){
			 $data['title'] = 'Nota Config';
        $data['mid_content'] = 'content/notadinas/show_config';
        $this->load->model('employee');
        $data['employees'] = $this->employee->get_all_emp();

        $this->load->model('admin_config');
        $data['config'] = $this->admin_config->load_config_data();
        $data['app_config'] = $this->admin_config->load_app_config();
        $data['conf'] = $this->nota_config->tampil();
	    $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $this->load->view('includes/home_template', $data);

		}
		function set(){
			 $data['title'] = 'Nota Config';
        $data['mid_content'] = 'content/notadinas/nota_config';
        $this->load->model('employee');
        $data['employees'] = $this->employee->get_all_emp();

        $this->load->model('admin_config');
        $data['config'] = $this->admin_config->load_config_data();
        $data['app_config'] = $this->admin_config->load_app_config();

        $username = $this->session->userdata('username');
        $data['result'] = $this->employee->get_detail_emp($username);
        $this->load->view('includes/home_template', $data);
		}
	}
?>