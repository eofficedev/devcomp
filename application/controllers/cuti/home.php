<?php
/**
* 
*/
class cust{
    function __construct(){}
}
class home extends ci_controller
{

	public $data;
    public $aktif_user;
	function __construct()
	{
		# code...
		parent::__construct();
        if($this->session->userdata('username')=="") die('Forbidden Access');
		  $this->data['title'] = 'Cuti';
        $this->load->model('employee');
        $this->data['employees'] = $this->employee->get_all_emp();
          $username = $this->session->userdata('username');
            $this->data['result'] = $this->employee->get_detail_emp($username);
            $employee = $this->data['result'];
            $this->load->model("cuti/database","employ",true);
            $this->employ->set_table("view_nota_employees");
            $this->employ->set_order("emp_num asc");
            $this->data["user_aktif"] = $employee->row();
            $this->aktif_user = $employee->row();
            $this->employ->set_where(array("emp_num"=>$this->aktif_user->emp_num));
            $this->data["user_aktif"] = $this->employ->tampil()[0];
            $this->aktif_user = $this->employ->tampil()[0];

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
        $where["tanggal_mulai >="] =date("Y-1-1");
        $where["tanggal_akhir <="] =date("Y-12-31");
        $this->libur_config->set_where($where);
        $this->libur_config->set_table("libur_config");
        $this->libur_config->set_order("id asc");
        $this->data["cuti_config"]=$this->cuti_config->tampil();
        $this->data["libur_config"]=$this->libur_config->tampil();
        $this->load->model("cuti/cuti","cuti",true);
        $this->load->model("cuti/cuti_approve","cuti_approve",true);
        $this->load->model("cuti/cuti_komentar","cuti_komentar",true);
        $this->load->model("cuti/cuti_lampiran","cuti_lampiran",true);

	}
    function edit($id){
           $where="emp_job IN (
                    SELECT job_num
                    FROM hrms_job
                    WHERE job_num
                    IN (
                        SELECT hr_job_num
                        FROM hrms_organization
                        WHERE org_num =".$this->aktif_user->org_num."
                        )
                    ) ";
            $this->employ->set_where($where);
            $this->data["hrnya"]=$this->employ->tampil();
            if(count($this->data["hrnya"])==0)
                $this->data["errornya"] = "data HR belum ada, silahkan hubungi admin anda!";
           $where="emp_job IN (
                    SELECT job_num
                    FROM hrms_job
                    WHERE job_num
                    IN (
                        SELECT kepala_job_num
                        FROM hrms_organization
                        WHERE org_num =".$this->aktif_user->org_num."
                        )
                    ) ";

            $this->data["harilibur"]=$this->getlibur();
            $this->employ->set_where($where);
            $this->data["kepalanya"]=$this->employ->tampil();
            if(count($this->data["kepalanya"])==0)
                $this->data["errornya"] = "data Kepala belum ada, silahkan hubungi admin anda!";    
            $where=array();      
        $where["id"] =$id;
        $this->cuti->set_where($where);
        $cuti=$this->cuti->tampil();
        if(count($cuti)==0)
                redirect("cuti/home");
        $this->data["cutinya"]=$cuti[0];
        $where["id"] = $cuti[0]->jenis_id;
        $this->cuti_config->set_where($where);
        if(count($this->cuti_config->tampil())==0)
                redirect("cuti/home");
        $this->data["jenisnya"]=$this->cuti_config->tampil()[0];
        $where = array();
        $where["cuti_id"] = $id;
        $this->cuti_komentar->set_where($where);
        if(count($this->cuti_komentar->tampil())==0)
                redirect("cuti/home");
        $this->data["komennya"]=$this->cuti_komentar->tampil()[0];
        $this->cuti_lampiran->set_where($where);
        $this->data["lampirannya"]=$this->cuti_lampiran->tampil();
      
        $this->data['mid_content'] = 'content/cuti/form_edit';
        $this->load->view('includes/home_template', $this->data);
    }
	function index(){
        $this->data["liburannya"] = $this->getlibur();
        $where["emp_num"] = $this->aktif_user->emp_num;
        $where["status"] = 2;
        $this->cuti->set_where($where);
        $this->cuti->set_table("view_cuti");

        $this->data["cuti_data"] = $this->cuti->tampil();
        $cuti_config = $this->cuti_config->tampil();
        $c;
        $l = $this->getlibur();
        $where["status"] = 4;
        $this->cuti->set_where($where);
        $this->data["draftData"] = $this->cuti->count();

        $where ="( status = 0 or status = 1 ) and emp_num = '".$this->aktif_user->emp_num."'";
        $this->cuti->set_where($where);
        $this->data["onProgressData"] = $this->cuti->count();

        $where ="( status = 3) and emp_num = '".$this->aktif_user->emp_num."'";
        $this->cuti->set_where($where);
        $this->data["returnData"] = $this->cuti->count();

        $where =array();
        $where["emp_num"] = $this->aktif_user->emp_num;
        $where["aktif"] = 1;
        $this->cuti_approve->set_where($where);
        $this->data["approveData"] = $this->cuti_approve->count();

        $w["tanggal_mulai >="] = date("Y-1-1");
        $i = 0;
        $cutiC=array();
        foreach ($cuti_config as $key) {
        $w["jenis_id"]=$key->id;
        $tahunini = date("Y");
        $tahunini = (int)$tahunini;
        $tahunnya = $tahunini - $key->mulai_aktif;
        $m=0;
        for($i= $key->mulai_aktif;$i<=$tahunini;$i+=$key->interval){
            $m=$i;
        }
        $n = $m+$key->interval-1;
            $wh["mulai >="] = $m."-1-1";
            $wh["selesai <="] = $n."-12-31";
            $wh["emp_num"] = $this->aktif_user->emp_num;
            $wh["status"]=2;
            $wh["jenis_id"]=$key->id;
            $this->cuti->set_where($wh);
            $ct = $this->cuti->tampil();
            if(count($ct)>0){
                $sisa = $key->alokasi;
                if($key->hari==1){
                    foreach ($ct as $k) {

                        $dateMulai = strtotime($k->mulai);
                        $dateSelesai = strtotime($k->selesai);
                        $seconds_diff = $dateSelesai-$dateMulai+1 ;
                        $hari = floor($seconds_diff/3600/24);
                        $sisa-=$hari;
                    }
                    $sisa--;
                }
                else{
                    foreach ($ct as $k) {
                        $dateMulai = strtotime($k->mulai);
                        $dateSelesai = strtotime($k->selesai);
                        $hari=0;
                        while($dateMulai<=$dateSelesai){
                            $dateMulai = strtotime("+1 day",$dateMulai);
                            $indexHari= date("N",$dateMulai);
                            if($indexHari==6||$indexHari==7){

                            }
                            else{
                                $libur = $this->getlibur();
                                $temu=false;
                                foreach ($libur as $l => $value) {
                                    if($value==date("Y-m-d",$dateMulai)){
                                        $temu=true;
                                        break;
                                    }
                                }
                                if(!$temu)
                                    $hari++;
                            }
                        }
                        $sisa-=$hari;
                    }
                }
            $key->telahAmbil = $key->alokasi-$sisa+1;
            
            }
            else
                $key->telahAmbil=0;
            array_push($cutiC, $key);
       //     echo print_r($key)."<br>";
                        $i++;
        }
        $this->data["cutiData"]=($cutiC);
        $this->data["libur"] = $this->libur_config->tampil();          
           $this->data['mid_content'] = 'content/cuti/home';
           $this->load->view('includes/home_template', $this->data);
    }
    function approve(){
        $stat = $this->input->post("submit");
        $cuti_id = $this->input->post("cuti_id");
        $where["cuti_id"]=$cuti_id;
        $where["emp_num"]=$this->aktif_user->emp_num;
        if($stat=="Setuju")
            $val["status"]=1;
        else if($stat=="Kembalikan")
            $val["status"]=2;
        else
            redirect("cuti/home");
        $val["waktu"] = date("Y-m-d H:i:s");
        $val["aktif"] = 0;
        $this->cuti_approve->set_where($where);
        $this->cuti_approve->values =$val;
        $this->cuti_approve->update();
        $c = $this->cuti_approve->tampil();
        if(count($c)==0)
            redirect("cuti/home");
        $where=array();
        $val=array();
        if($c[0]->urutan==1){
            if($stat=="Setuju"){
                $where["cuti_id"] =$cuti_id;
                $where["urutan"]=2;
                $val["aktif"]=1;
                $this->cuti_approve->set_where($where);
                $this->cuti_approve->values =$val;
                $this->cuti_approve->update();
                $where=array();
                $where["id"]=$cuti_id;
                $this->cuti->set_where($where);
                $val=array();
                $val["status"]=1;
                $val["last_edited"]=date("Y-m-d H:i:s");
                $this->cuti->values=$val;
                $this->cuti->update();
            }
            if($stat=="Kembalikan"){
                $where["id"]=$cuti_id;
                $this->cuti->set_where($where);
                $val=array();
                $val["status"]=3;
                $val["last_edited"]=date("Y-m-d H:i:s");
                $this->cuti->values=$val;
                $this->cuti->update();
            }
        }
        else{
            if($stat=="Setuju"){
                $where["id"]=$cuti_id;
                $this->cuti->set_where($where);
                $val=array();
                $val["status"]=2;
                $val["last_edited"]=date("Y-m-d H:i:s");
                $this->cuti->values=$val;
                $this->cuti->update();
            }
        }
        if($stat=="Kembalikan"){
            $where["id"]=$cuti_id;
            $this->cuti->set_where($where);
            $val=array();
            $val["status"]=3;
            $val["last_edited"]=date("Y-m-d H:i:s");
            $this->cuti->values=$val;
            $this->cuti->update();
            $where=array();
            $where["cuti_id"] = $cuti_id;
            $where["urutan"] = 1;
            $this->cuti_approve->set_where($where);
            $this->cuti_approve->update();
        }
        redirect("cuti/home");

    }
    function mohon(){
           $where="emp_job IN (
                    SELECT job_num
                    FROM hrms_job
                    WHERE job_num
                    IN (
                        SELECT hr_job_num
                        FROM hrms_organization
                        WHERE org_num =".$this->aktif_user->org_num."
                        )
                    ) ";
            $this->employ->set_where($where);
            $this->data["hrnya"]=$this->employ->tampil();
            if(count($this->data["hrnya"])==0)
                $this->data["errornya"] = "data HR belum ada, silahkan hubungi admin anda!";
           $where="emp_job IN (
                    SELECT job_num
                    FROM hrms_job
                    WHERE job_num
                    IN (
                        SELECT kepala_job_num
                        FROM hrms_organization
                        WHERE org_num =".$this->aktif_user->org_num."
                        )
                    ) ";
            $this->data["harilibur"]=$this->getlibur();
            $this->employ->set_where($where);
            $this->data["kepalanya"]=$this->employ->tampil();
            if(count($this->data["kepalanya"])==0)
                $this->data["errornya"] = "data kepala belum ada, silahkan hubungi admin anda!";          
           $this->data['mid_content'] = 'content/cuti/permohonan';
           $this->load->view('includes/home_template', $this->data);
        }
    function getlibur(){
        $where["tanggal_mulai >="] =date("Y-1-1");
        $where["tanggal_akhir <="] =date("Y-12-31");
        $this->libur_config->set_where($where);
        $libur = $this->libur_config->tampil();
        $l = array();
        $i=0;
        foreach ($libur as $key) {
           if($key->tanggal_mulai!=$key->tanggal_akhir)
           {
                while($key->tanggal_mulai!=$key->tanggal_akhir)
                {   
                    $l[$i] = $key->tanggal_mulai;
                    $key->tanggal_mulai = strtotime($key->tanggal_mulai);
                    $key->tanggal_mulai = strtotime("+1 day",$key->tanggal_mulai);
                    $key->tanggal_mulai = date("Y-m-d",$key->tanggal_mulai);
                    $i++;
                }
                $l[$i] = $key->tanggal_mulai;
            }
            else{
                if($i>0){
                    if(isset($l[$i])){
                        if($l[$i]!="")
                            $i++;
                    }
                }                            
                $l[$i] = $key->tanggal_mulai;
                $i++;
            }
        }
        return $l;
    }
    function getjenis($emp_num = null){
        $where["id"] = $_GET["jenis_id"];
        $this->cuti_config->set_where($where);
        $cfg = $this->cuti_config->tampil()[0];
        $where=array();
        $where["jenis_id"]=$_GET["jenis_id"];
        $tahunini = date("Y");
        $tahunini = (int)$tahunini;
        $tahunnya = $tahunini - $cfg->mulai_aktif;
        $m=0;
        for($i= $cfg->mulai_aktif;$i<=$tahunini;$i+=$cfg->interval){
            $m=$i;
        }
        $n = $m+$cfg->interval;
        $where["mulai >="] = $m."-1-1";
        $where["selesai <="] = $n."-12-31";
        if($emp_num==null)
            $where["emp_num"]=$this->aktif_user->emp_num;
        else
            $where["emp_num"]=$emp_num;
        $where["status"]="2";
        $this->cuti->set_where($where);
        $ct = $this->cuti->tampil();
        $res = new cust();
        $res->sekaligus = $cfg->sekaligus;
        $res->hari = $cfg->hari;
        if(count($ct)>0){
            if($res->sekaligus!=1){
                $sisa = $cfg->alokasi;
                if($res->hari==1){
                    foreach ($ct as $key) {
                        $dateMulai = strtotime($key->mulai);
                        $dateSelesai = strtotime($key->selesai);
                        $seconds_diff = $dateSelesai-$dateMulai+1 ;
                        $hari = floor($seconds_diff/3600/24);
                        $sisa-=$hari;
                    }
                    $sisa--;
                }
                else{
                    foreach ($ct as $key) {
                        $dateMulai = strtotime($key->mulai);
                        $dateSelesai = strtotime($key->selesai);
                        $hari=0;
                        while($dateMulai<=$dateSelesai){
                            $dateMulai = strtotime("+1 day",$dateMulai);
                            $indexHari= date("N",$dateMulai);
                            if($indexHari==6||$indexHari==7){

                            }
                            else{
                                $libur = $this->getlibur();
                                $temu=false;
                                foreach ($libur as $key => $value) {
                                    if($value==date("Y-m-d",$dateMulai)){
                                        $temu=true;
                                        break;
                                    }
                                }
                                if(!$temu)
                                    $hari++;
                            }
                        }
                        $sisa-=$hari;
                    }
                }
                $res->sisa = $sisa-1;
            }
            else
                $res->sisa = 0;
        }
        else{
            $res->sisa = $cfg->alokasi;
        }
        if($res->sisa<0)
            $res->sisa=0;
        echo json_encode($res);
    }
    function input($id = null){
        if($this->input->post("submit")=="Kirim")
            $this->submit($id);
        else if($this->input->post("submit")=="Simpan")
            $this->simpan($id);
        else
            redirect("site");
    }
    function submit($id = null){
       $val["emp_num"]=$this->aktif_user->emp_num;
        $val["selesai"]=$this->input->post("selesai");
        $val["mulai"]=$this->input->post("mulai");
        $val["jenis_id"]=$this->input->post("jenis_id");
        $val["alasan"]=$this->input->post("alasans");
        $val["telpon"]=$this->input->post("telp");
        $val["alamat"]=$this->input->post("alamat");
        $val["last_edited"]=date("Y-m-d H:i:s");
        $val["status"]=0;
        if($id == null){
            $id = $this->cuti->getIncrement("id");
            $val["id"]=$id;
            $this->cuti->set_values($val);
            $this->cuti->simpan();
        }
        else{
            $where["id"]=$id;
            $this->cuti->set_where($where);
            $this->cuti->set_values($val);
            $this->cuti->update();
        }
        $val = null;
        $val["cuti_id"] = $id;
        $val["emp_num"]=$this->aktif_user->emp_num;
        $val["komentar"] = $this->input->post("komentar");
        $wh["cuti_id"] = $id;
        $this->cuti_komentar->set_where($wh);
        $this->cuti_komentar->hapus();
        $this->cuti_komentar->set_values($val);
        $this->cuti_komentar->simpan();
        $config = array(
            'allowed_types' => '*',
            'upload_path' =>'upload/cuti/',
            'max_size' => 0,
        );
        $this->load->library('upload', $config);
        $files = $_FILES;
        $cpt = count($_FILES['lampiran']['name']);
        for ($i = 0; $i < $cpt; $i++) {

            $_FILES['userfile']['name'] = $files['lampiran']['name'][$i];
            $_FILES['userfile']['type'] = $files['lampiran']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['lampiran']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $files['lampiran']['error'][$i];
            $_FILES['userfile']['size'] = $files['lampiran']['size'][$i];

            if($this->upload->do_upload('userfile')){
              $data = array('upload_data' => $this->upload->data());
              $values["name"]= $files['lampiran']['name'][$i];
              $values["cuti_id"]= $id;
              $values["link"]= $data['upload_data']['file_name'];
              $this->cuti_lampiran->values = $values;
              $this->cuti_lampiran->simpan();
            }
            else{
              $error = array('error' => $this->upload->display_errors());
              $this->data["valid"] = $error['error'];
            }
        }
        $where="";
        $where["cuti_id"] = $id;
        $this->cuti_approve->set_where($where);
         $this->cuti_approve->hapus();

         $where="emp_job IN (
                    SELECT job_num
                    FROM hrms_job
                    WHERE job_num
                    IN (
                        SELECT hr_job_num
                        FROM hrms_organization
                        WHERE org_num =".$this->aktif_user->org_num."
                        )
                    ) ";
            $this->employ->set_where($where);
            $h=$this->employ->tampil()[0];
           $where="emp_job IN (
                    SELECT job_num
                    FROM hrms_job
                    WHERE job_num
                    IN (
                        SELECT kepala_job_num
                        FROM hrms_organization
                        WHERE org_num =".$this->aktif_user->org_num."
                        )
                    ) ";
            $this->employ->set_where($where);
            $f=$this->employ->tampil()[0];
            $val=null;
            $val["cuti_id"] = $id;
            $val["urutan"] = 2;
            $val["status"] = 0;
            $val["aktif"] = 0;
            $val["waktu"] = date("Y-m-d H:i:s");
            $val["emp_num"] = $h->emp_num;
            $this->cuti_approve->set_values($val);
            $this->cuti_approve->simpan();
            $val["emp_num"] = $f->emp_num;
            $val["urutan"] = 1;
            $val["status"] = 0;
            $val["aktif"] = 1;
            $val["waktu"] = date("Y-m-d H:i:s");
            $this->cuti_approve->set_values($val);
            $this->cuti_approve->simpan();
            redirect("cuti/home");
    }
    function simpan($id){
       $val["emp_num"]=$this->aktif_user->emp_num;
        $val["selesai"]=$this->input->post("selesai");
        $val["mulai"]=$this->input->post("mulai");
        $val["jenis_id"]=$this->input->post("jenis_id");
        $val["alasan"]=$this->input->post("alasans");
        $val["telpon"]=$this->input->post("telp");
        $val["alamat"]=$this->input->post("alamat");
        $val["status"]=4;
        if($id == null){
            $id = $this->cuti->getIncrement("id");
            $val["id"]=$id;
            $this->cuti->set_values($val);
            $this->cuti->simpan();
        }
        else{
            $where["id"]=$id;
            $this->cuti->set_where($where);
            $this->cuti->set_values($val);
            $this->cuti->update();
        }
        $val = null;
        $val["cuti_id"] = $id;
        $val["emp_num"]=$this->aktif_user->emp_num;
        $val["komentar"] = $this->input->post("komentar");
        $wh["cuti_id"] = $id;
        $this->cuti_komentar->set_where($wh);
        $this->cuti_komentar->hapus();
        
        $this->cuti_komentar->set_values($val);
        $this->cuti_komentar->simpan();
         $config = array(
            'allowed_types' => '*',
            'upload_path' =>'upload/cuti/',
            'max_size' => 0,
        );
        $this->load->library('upload', $config);
        $files = $_FILES;
        echo print_r($files);
        $cpt = count($_FILES['lampiran']['name']);
        for ($i = 0; $i < $cpt; $i++) {

            $_FILES['userfile']['name'] = $files['lampiran']['name'][$i];
            $_FILES['userfile']['type'] = $files['lampiran']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['lampiran']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $files['lampiran']['error'][$i];
            $_FILES['userfile']['size'] = $files['lampiran']['size'][$i];

            if($this->upload->do_upload('userfile')){
              $data = array('upload_data' => $this->upload->data());
              $values["name"]= $files['lampiran']['name'][$i];
              $values["cuti_id"]= $id;
              $values["link"]= $data['upload_data']['file_name'];
              $this->cuti_lampiran->values = $values;
              $this->cuti_lampiran->simpan();
            }
            else{
              $error = array('error' => $this->upload->display_errors());
              $this->data["valid"] = $error['error'];
            }
        }
            redirect("cuti/home");

    }
    function page($p,$tanggal="ALL"){
        $where="";
        if($p=="draft"){
            $where="status = '4' ";
            $this->data["judul"]="Draft";
        }
        else if($p=="approve"){
            $this->data["judul"]="Perlu Proses";
        }
        else if($p=="progress")
         {
             $where= "(status ='0' or status = '1') ";
            $this->data["judul"]="Sedang Proses";
         }  
        else if($p=="return")
         {
             $where= "(status ='3') ";
            $this->data["judul"]="yang di Return";
         }  
        else
            redirect("cuti/home");
        if($tanggal!="ALL"){
           $where.=" and mulai >= '".$tanggal."' and  selesai <= '".$tanggal."'";
            
        }
     

        $this->cuti->set_table("view_cuti");
        if($p=="progress" or $p=="draft" or $p=="return")
            $where.=" and emp_num = '".$this->aktif_user->emp_num."'";
        else 
            $where.="id in (select cuti_id from cuti_approve where emp_num = '".$this->aktif_user->emp_num."' and ( aktif= '1' or status <> '0'))";
        $this->cuti->set_where($where);
        $jml = $this->cuti->count();
        $config['base_url'] = base_url().'index.php/cuti/home/page/'.$p.'/'.$tanggal."/";
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
        $this->cuti->set_uri($this->uri->segment(6));

        $this->cuti->set_limit($config['per_page']);
        
        $this->data["cutiData"]=$this->cuti->tampil();
        $this->data['mid_content'] = 'content/cuti/page';
        $this->load->view('includes/home_template', $this->data);
    }
    function approve_form($cuti_id){
        $this->cuti->set_table("view_cuti");
        $this->cuti->set_where(array("id"=>$cuti_id));
        $this->cuti_approve->set_where(array("emp_num"=>$this->aktif_user->emp_num,"cuti_id"=>$cuti_id));
        $cuti = $this->cuti->tampil();
        $approve = $this->cuti_approve->tampil();
        if(count($cuti)==0)
            redirect("cuti/home");
        if(count($approve)==0)
            redirect("cuti/home");
        $this->data["cuti"] = $cuti[0];
        $this->data["approve"] = $approve[0];
        $this->employ->set_where(array("emp_num"=>$cuti[0]->emp_num)); 
        $this->cuti_komentar->set_where("cuti_id = '".$cuti[0]->id."'");
        $this->cuti_lampiran->set_where("cuti_id = '".$cuti[0]->id."'");
        $this->data["komentar"]=$this->cuti->cuti_komentar->tampil();
        $this->data["lampiran"]=$this->cuti->cuti_lampiran->tampil();
        $this->data["cuti_creator"] = $this->employ->tampil()[0];
        $this->data['mid_content'] = 'content/cuti/approve_page';
        $this->load->view('includes/home_template', $this->data);
    }
    function hapusLampiran(){
        $id=$this->input->post("id");
        $where["id"]=$id;
        $this->cuti_lampiran->set_where($where);
        $this->cuti_lampiran->hapus();
        echo "true";
    }
}
?>