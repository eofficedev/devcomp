<?php
class index extends ci_controller{
    public $data;
    public $aktif_user;
	public function __construct(){
		parent::__construct();
         if($this->session->userdata('username')=="") die('Forbidden Access');
            $this->load->model('employee');
            $this->load->model('job');
            $this->load->model("notadinas/folder","folder",true);

            $this->load->model('notifications');
                  $this->load->model("notadinas/nota_options","nota_options",true);

                  $this->load->model("notadinas/komentar","komentar",true);
      $this->load->helper("kode");
                  $this->load->model("notadinas/folder_mapping","folder_mapping",true);
                  $this->load->model("notadinas/lampiran","lampiran",true);
                  $this->load->model("notadinas/masalah","kode_masalah",true);
                  $this->load->model("notadinas/pemeriksa","pemeriksa",true);
                  $this->load->model("notadinas/nota","nota",true);
                  $this->load->model("notadinas/referensi","referensi",true);
                  $this->load->model("notadinas/penerima","penerima",true);
                  $this->load->model("notadinas/emp","pegawai",true);
                  $this->load->model("notadinas/database","tampilan",true);
                  $this->load->model("notadinas/notifikasi","notifikasi",true);
            $username = $this->session->userdata('username');
            $this->data['result'] = $this->employee->get_detail_emp($username);
            $employee = $this->data['result'];
            $this->data["user_aktif"] = $employee->row();
            $this->aktif_user = $employee->row();

            $emp_data = $employee->row();
            $this->data['app_config'] = $this->admin_config->load_app_config();
            $this->data["user_aktif"] = $employee->row();
            
            $this->data['pemeriksa'] = $this->employee->load_pemeriksa_sppd();
            $this->data['list_profile'] = $this->employee->load_list_profile($emp_data->emp_num);
            $this->data['app_config'] = $this->admin_config->load_app_config();
            $this->data['all_atasan'] = $this->pemeriksa->get_all_atasan($emp_data->emp_num);
            $this->data['all_atasan_pmh'] = $this->employee->get_all_atasan_pmh();
            $this->data['fiatur'] = $this->employee->get_fiatur_by_org($emp_data->org_id);
      $this->data['title'] = 'Nota Dinas';
      
            $emp_data = $employee->row();
            $where = array("emp_num"=>$emp_data->emp_num);
            $this->folder->set_where($where);
            $this->data["folder"] = $this->folder->tampil();
    }
    function get_all_atasan(){

       $data = $this->pemeriksa->get_all_atasan($this->aktif_user->emp_num);
    }
    function get_all_atasan_json(){
       $data = $this->pemeriksa->get_all_atasan($this->aktif_user->emp_num);
    }
    function move_all_archive(){
      $this->nota->set_order("nota_date desc");
      $n = $this->nota->tampil();
      $jml = $this->nota->count();
      if($jml==0) return false;
      $date = explode("-",$n[0]->nota_date);
      $year = $date[0];
      $now = date("Y");
      if($now>$year){
            $where = array("emp_num"=>$this->aktif_user->emp_num,"folder_name"=>"archive");
            $this->folder->set_where($where);
            $f = $this->folder->tampil();
            $id_folder = $f[0]->folder_id;
            $where= array("emp_num"=>$this->aktif_user->emp_num,"folder_name <>"=>"progress","year(create_date) <>"=>$now);
            $this->tampilan->set_table("nota_custom_view");
            $this->tampilan->set_where($where);
            $this->tampilan->set_order("mapping_id asc");
            $mapping = $this->tampilan->tampil();
            foreach ($mapping as $m) {
              $where = array("mapping_id"=>$m->mapping_id);
              $values = array('folder_id' => $id_folder );
              $this->folder_mapping->values = $values;
              $this->folder_mapping->set_where($where);
              $this->folder_mapping->update();
          }
        }
    }
	public function index($error=NULL){
            $where = array("emp_num"=>$this->aktif_user->emp_num,"folder_name"=>"inbox");
            $this->folder->set_where($where);

            $f = $this->folder->tampil();

            $id_folder = $f[0]->folder_id;
            $this->data["folder_id"]=$id_folder;

            $this->move_all_archive();
            $this->data['error'] = $error;
            
            $username = $this->session->userdata('username');
            $this->data['result'] = $this->employee->get_detail_emp($username);
            $employee = $this->data['result'];
            $emp_data = $employee->row();
            $where = array("emp_num"=>$emp_data->emp_num);
            $this->folder->set_where($where);
            $this->data["folder"] = $this->folder->tampil();

            $dt = $this->data['result']->row();
            $this->data['job'] = $this->job->get_job_data_by_code($dt->job_code)->row();

           
                if($username=="reservation"){
                    $this->data['mid_content'] = 'content/home/home_reservation';
                }
                else {
                    $this->data['mid_content'] = 'content/notadinas/home';
                }
            
            $this->load->view('includes/home_template', $this->data);
	}
    function perlu_progress($nota_id,$error=null){
            $this->data['error'] = $error;

            $where = array("emp_num"=>$this->aktif_user->emp_num,"folder_name"=>"inbox");
            $this->folder->set_where($where);

            $f = $this->folder->tampil();
            
            $id_folder = $f[0]->folder_id;
            $this->data["folder_id"]=$id_folder;

        $examiner_id = $this->aktif_user->emp_num;
         $where = array("nota_id"=>$nota_id);

            $username = $this->session->userdata('username');
            $this->data['result'] = $this->employee->get_detail_emp($username);
            $employee = $this->data['result'];
            $emp_data = $employee->row();
            $where = array("emp_num"=>$emp_data->emp_num);
            $this->folder->set_where($where);
            $this->data["folder"] = $this->folder->tampil();

            $dt = $this->data['result']->row();
            $this->data['job'] = $this->job->get_job_data_by_code($dt->job_code)->row();

           
                if($username=="reservation"){
                    $this->data['mid_content'] = 'content/home/home_reservation';
                }
                else {
                    $this->data['mid_content'] = 'content/notadinas/home';
                }
            $this->data["notifikasi"]="progress";
         $this->data["parameter"] = "'".$nota_id."','".$examiner_id."'";
        $this->data['error'] = $error;
   $this->nota_options->set_where(array("nota_id"=>$nota_id));
                $this->data["options"] = $this->nota_options->tampil();
              
            $this->load->view('includes/home_template', $this->data);
  
    }
    function inbox($nota_id,$error=null){
                  $this->data['error'] = $error;

   $this->nota_options->set_where(array("nota_id"=>$nota_id));
                $this->data["options"] = $this->nota_options->tampil();
 $where = array("emp_num"=>$this->aktif_user->emp_num,"folder_name"=>"inbox");
            $this->folder->set_where($where);

            $f = $this->folder->tampil();
            
            $id_folder = $f[0]->folder_id;
            $this->data["folder_id"]=$id_folder;

        $examiner_id = $this->aktif_user->emp_num;
         $where = array("nota_id"=>$nota_id);

            $username = $this->session->userdata('username');
            $this->data['result'] = $this->employee->get_detail_emp($username);
            $employee = $this->data['result'];
            $emp_data = $employee->row();
            $where = array("emp_num"=>$emp_data->emp_num);
            $this->folder->set_where($where);
            $this->data["folder"] = $this->folder->tampil();

            $dt = $this->data['result']->row();
            $this->data['job'] = $this->job->get_job_data_by_code($dt->job_code)->row();

           
                if($username=="reservation"){
                    $this->data['mid_content'] = 'content/home/home_reservation';
                }
                else {
                    $this->data['mid_content'] = 'content/notadinas/home';
                }
            $this->data["notifikasi"]="inbox";
         $this->data["parameter"] = "'".$nota_id."'";
        $this->data['error'] = $error;
            
            $this->load->view('includes/home_template', $this->data);
  
           }
}
?>