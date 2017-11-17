<?php
/**
* 
*/
class home extends ci_controller
{
	private $aktif_user;
	private $batasTerlambat;
	function __construct()
	{
		parent::__construct();
		        $this->load->model('employee');
            $this->load->model('job');
      $this->data['app_config'] = $this->admin_config->load_app_config();
          
      		$this->data['title'] = 'Absensi';
      		$this->load->model("absensi/absensi","absensi",true);
           $this->load->model("absensi/database","absensi_config",true);
            $this->absensi_config->set_table("absensi_config");
            $this->absensi_config->set_order("waktu_keterlambatan asc");
            $this->batasTerlambat=$this->absensi_config->tampil();
            $this->load->helper("captcha");
            $this->data["error"]="";
            if(count($this->batasTerlambat)==0)
              die('Belum di konfigurasi oleh admin');

	}
  function cekabsen($pencarian="ALL",$tanggal="ALL"){
    $this->data["error"] = "";
        
              $username = $this->session->userdata('username');
             $this->data['result'] = $this->employee->get_detail_emp($username);
            $employee = $this->data['result'];
            $this->data["user_aktif"] = $employee->row();
            $this->aktif_user = $employee->row();

            $emp_data = $employee->row();
            $this->data['app_config'] = $this->admin_config->load_app_config();
            
            $this->data['list_profile'] = $this->employee->load_list_profile($emp_data->emp_num);
            $this->data['app_config'] = $this->admin_config->load_app_config();
             $this->data['all_atasan_pmh'] = $this->employee->get_all_atasan_pmh();
            $this->data['fiatur'] = $this->employee->get_fiatur_by_org($emp_data->org_id);
              $emp_data = $employee->row();
           
    $this->load->library("pagination");
    $this->absensi->set_table("vw_absensi");
    $this->absensi->set_order("waktu desc");
    $pencarian = str_replace("%20", " ", $pencarian);
    $where="emp_num = '".$this->aktif_user->emp_num."'";
    if($pencarian!="ALL")
      $where.= " and (emp_firstname like '%".$pencarian."%' or emp_lastname like '%".$pencarian."%' or status like '%".$pencarian."%') ";
    if($tanggal!="ALL")
      $where.=" and waktu > '".date("Y-m-d 00:00:00",strtotime($tanggal))."' and waktu < '".date("Y-m-d 23:59:59",strtotime($tanggal))."'";
    $config['base_url'] = base_url().'index.php/absensi/home/cekabsen/'.$pencarian.'/'.$tanggal."/";
    
    $this->absensi->set_where($where);
    $jml = $this->absensi->count();
    $config['total_rows'] = $jml;
    $config['uri_segment'] = 6;
    $config['per_page'] = 10;
    $config['use_page_numbers'] = TRUE;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $this->pagination->initialize($config); 
    $this->data['paging']=$this->pagination->create_links();
    $this->absensi->set_uri($this->uri->segment(6));
    $this->absensi->set_limit($config['per_page']);
    $this->data["data_absen"]=$this->absensi->tampil();
       $this->data['mid_content'] = 'content/absensi/cekabsen';
      $this->load->view('includes/home_template', $this->data);
            $this->data['app_config'] = $this->admin_config->load_app_config();
            $this->data["cekKet"]="false";
  }
	function index(){

         $vals = array(
                'img_path'   => './public/captcha/',
                'img_url'  => base_url().'/public/captcha/',
                'img_width'  => '200',
                'img_height' => 30,
                'border' => 0, 
                'expiration' => 7200
            );
 
            // create captcha image
            $cap = create_captcha($vals);
            // store image html code in a variable
            $this->data['image'] = $cap['image'];
 
            // store the captcha word in a session
            $this->session->set_userdata('mycaptcha', $cap['word']);
       $this->data['mid_content'] = 'content/absensi/home';
            $this->data['app_config'] = $this->admin_config->load_app_config();
            $this->load->view('includes/login_template', $this->data);
	}
  function inputketerangan(){
  $this->data['result'] = $this->employee->get_detail_emp($this->input->post("username"));
           $employee = $this->data['result'];
            $this->data["user_aktif"] = $employee->row();
            $u = $employee->row();
     $where="emp_num = '".$u->emp_num."' and waktu > '".date("Y-m-d 00:00:00")."' and waktu < '".date("Y-m-d 23:59:59")."'";
     $val["keterangan"] = $this->input->post("keterangan");
      $this->absensi->set_where($where);
      $this->absensi->values = $val;
      $this->absensi->update();
      $this->data["cekKet"]="true";


          $where="emp_num = '".$u->emp_num."' and waktu > '".date("Y-m-d 00:00:00")."' and waktu < '".date("Y-m-d 23:59:59")."'";
          $this->absensi->set_where($where);
          $this->data["telahabsens"]=$this->absensi->tampil();
          $this->data['mid_content'] = 'content/absensi/telahabsen';
      $this->load->view('includes/login_template', $this->data);
  }
  function input(){
      $this->load->model("absensi/database","usernya",true);
      $this->usernya->set_table("hrms_user");
      $this->usernya->set_order("emp_id asc");
      $where["emp_username"]=$this->input->post("username");
      $where["emp_password"]=md5($this->input->post("password"));
      $this->usernya->set_where($where);
      $u = $this->usernya->tampil();
      if(strtoupper($this->input->post("captcha"))!=strtoupper($this->session->userdata("mycaptcha"))){
         $vals = array(
                'img_path'   => './public/captcha/',
                'img_url'  => base_url().'/public/captcha/',
                'img_width'  => '200',
                'img_height' => 30,
                'border' => 0, 
                'expiration' => 7200
            );
 
            // create captcha image
            $cap = create_captcha($vals);
            // store image html code in a variable
            $this->data['image'] = $cap['image'];
 
            // store the captcha word in a session
            $this->session->set_userdata('mycaptcha', $cap['word']);
            $this->data['mid_content'] = 'content/absensi/home';
            $this->data["error"] = "Captcha yang anda masukan salah!";
           $this->data['mid_content'] = 'content/absensi/home';
      }
      else{
        if(count($u)==0){
           $vals = array(
                'img_path'   => './public/captcha/',
                'img_url'  => base_url().'/public/captcha/',
                'img_width'  => '200',
                'img_height' => 30,
                'border' => 0, 
                'expiration' => 7200
            );
 
            // create captcha image
            $cap = create_captcha($vals);
            // store image html code in a variable
            $this->data['image'] = $cap['image'];
 
            // store the captcha word in a session
            $this->session->set_userdata('mycaptcha', $cap['word']);
            $this->data['mid_content'] = 'content/absensi/home';
            $this->data["error"] = "Username atau password anda salah!";
           $this->data['mid_content'] = 'content/absensi/home';

        }
        else{
          $where="emp_num = '".$u[0]->emp_id."' and waktu > '".date("Y-m-d 00:00:00")."'";
          $this->absensi->set_where($where);
          $abs = $this->absensi->tampil();
          $this->data["telahabsens"]=$this->absensi->tampil();
          if(count($abs)==0){
            $val["emp_num"] = $u[0]->emp_id;
            $val["waktu"] = date("Y-m-d H:i:s");
            $waktu = date("H:i:s");
            if(strtotime($waktu)>strtotime($this->batasTerlambat[0]->waktu_keterlambatan))
              $val["Status"] = "Terlambat";
            else{
              $val["Status"] = "Tepat Waktu";
              $val["keterangan"] = "-";

            }
              
            $this->absensi->values = $val;
            $this->absensi->simpan();

          $this->data['result'] = $this->employee->get_detail_emp($this->input->post("username"));
             $employee = $this->data['result'];
              $this->data["user_aktif"] = $employee->row();
            $where="emp_num = '".$u[0]->emp_id."' and waktu > '".date("Y-m-d 00:00:00")."' and waktu < '".date("Y-m-d 23:59:59")."'";
            $this->absensi->set_where($where);
            $this->data["telahabsens"]=$this->absensi->tampil();
          }
          else if(count($abs)==1){
          

             $this->data['result'] = $this->employee->get_detail_emp($this->input->post("username"));
             $employee = $this->data['result'];
              $this->data["user_aktif"] = $employee->row();
              $val["emp_num"] = $u[0]->emp_id;
            $val["waktu"] = date("Y-m-d H:i:s");
            $waktu = date("H:i:s");
              $val["Status"] = "Pulang";
              $val["keterangan"] = "-";
             $this->absensi->values = $val;
            $this->absensi->simpan();
            $where="emp_num = '".$u[0]->emp_id."' and waktu > '".date("Y-m-d 00:00:00")."'";
            $this->absensi->set_order("waktu desc");
          $this->absensi->set_where($where);
          $abs = $this->absensi->tampil();
          $this->data["telahabsens"]=$this->absensi->tampil();
            
          }
          else{
          $this->data["telahabsens"]="sudah pulang";

          }
          $this->data['mid_content'] = 'content/absensi/telahabsen';
          
        }
      }
      $this->load->view('includes/login_template', $this->data);
  }
}
?>