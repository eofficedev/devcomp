<?php
	class nav extends ci_controller{
		function __construct(){
      $data;
      $aktif_user;
			parent::__construct();

                  $this->load->model("notadinas/komentar","komentar",true);
      $this->load->helper("kode");
                  $this->load->model("notadinas/folder_mapping","folder_mapping",true);
			$this->load->model('employee');
                  $this->load->model("notadinas/lampiran","lampiran",true);
                  $this->load->model('job');
                  $this->load->model("notadinas/masalah","kode_masalah",true);
                  $this->load->model("notadinas/nota","nota",true);
                  $this->load->model("notadinas/folder","folder",true);
      	          $this->load->model("notadinas/referensi","referensi",true);
                  $this->load->model("notadinas/penerima","penerima",true);
                  $this->load->model("notadinas/pemeriksa","pemeriksa",true);
                  $this->load->model("notadinas/emp","pegawai",true);
                  $this->load->model("notadinas/database","tampilan",true);
                  $this->load->model("notadinas/notifikasi","notifikasi",true);
                  $this->load->model("notadinas/pemeriksa","tampilan_pemeriksa",true);
           
                  $this->load->model("notadinas/nota_config","nota_config",true);
                  $this->load->model("notadinas/nota_options","nota_options",true);
           
                  $username = $this->session->userdata('username');
                  if($this->session->userdata('username')=="") die('Forbidden Access');
                  
            $this->data['result'] = $this->employee->get_detail_emp($username);
            $employee = $this->data['result'];
            $this->data["user_aktif"] = $employee->row();
            $this->aktif_user = $employee->row();

            $emp_data = $employee->row();
            $where = array("emp_num"=>$emp_data->emp_num);
            $this->folder->set_where($where);
            $this->data["folder"] = $this->folder->tampil();

                  $this->tampilan->set_table("view_nota_employees");
                  $this->tampilan->set_order("org_code asc");
                  $this->data['app_config'] = $this->admin_config->load_app_config();
                  $this->data['all_atasan'] = $this->tampilan_pemeriksa->get_all_atasan($emp_data->emp_num);

                  $this->data['all_emp'] = $this->tampilan->tampil();
                  $this->data['all_atasan_pmh'] = $this->employee->get_all_atasan_pmh();
            
        }
      function form_edit_nota($nota_id=null){
                 $this->penerima->tampil();
                 $this->data["masalah"] = $this->kode_masalah->tampil();
                  $username = $this->session->userdata('username');
                  $this->data['result'] = $this->employee->get_detail_emp($username);
                  $employee = $this->data['result'];
                  $emp_data = $employee->row();
                  $dt = $this->data['result']->row();
                  $this->data['job'] = $this->job->get_job_data_by_code($dt->job_code)->row();
                  $this->data['error'] = $error;
                  $this->data['fiatur'] = $this->employee->get_fiatur_by_org($emp_data->org_id);
                $this->load->view("content/notadinas/compose",$this->data);
        }
		function compose($error=null){
              $this->penerima->tampil();
                 $this->data["masalah"] = $this->kode_masalah->tampil();
                  $username = $this->session->userdata('username');
                  $this->data['result'] = $this->employee->get_detail_emp($username);
                  $employee = $this->data['result'];
                  $emp_data = $employee->row();
                  $dt = $this->data['result']->row();
                  $this->data['job'] = $this->job->get_job_data_by_code($dt->job_code)->row();
                  $this->load->model('notifications');
                  $this->data['app_config'] = $this->admin_config->load_app_config();
                  $this->data['pemeriksa'] = $this->employee->load_pemeriksa_sppd();
                  $this->data['list_profile'] = $this->employee->load_list_profile($emp_data->emp_num);
                  $this->data['error'] = $error;
                  $this->data['fiatur'] = $this->employee->get_fiatur_by_org($emp_data->org_id);
      		$this->load->view("content/notadinas/compose",$this->data);
            }
        function folder_change($name,$filter="ALL",$year="ALL"){
                  $username = $this->session->userdata('username');
                  $employee = $this->employee->get_detail_emp($username);;
                  $emp_data = $employee->row();
                  $where = array("emp_num"=>$emp_data->emp_num, "folder_id"=> $name);
                  $this->folder->set_where($where);
                  $f = $this->folder->tampil();
                  $where= "emp_num ='". $emp_data->emp_num."'";

                  $this->folder->set_order(" create_date desc, nota_id desc");
                  if($f[0]->folder_name == 'progress'){
                    $where= "examiner_id ='". $emp_data->emp_num."' and ( status = 'AKTIF'  or read_status = 1  )";
                  if($filter!="ALL")$where = $where ." and month(exam_date)='".$filter."'";
                  if($year!="ALL")$where = $where ." and year(exam_date)='".$year."'";
	
                  $this->folder->set_order("exam_date desc");
                    $this->folder->set_order("examine_id desc");
                  }
                  else{
                  if($filter!="ALL")$where = $where ." and month(create_date)='".$filter."'";
                  if($year!="ALL")$where = $where ." and year(create_date)='".$year."'";

                  }
                  $this->folder->set_where($where);
                  if($f[0]->folder_name == 'inbox' or $f[0]->folder_name == 'sent' or $f[0]->folder_name == 'progress' or $f[0]->folder_name == 'draft' )
                        {  

                  $this->folder->set_table("nota_".$f[0]->folder_name."_view");
                  $this->data["isi_folder"] = $this->folder->tampil();
                        $this->load->view("content/notadinas/".$f[0]->folder_name, $this->data);
                   }
                  else{
                  $where= "emp_num = ". $emp_data->emp_num." and folder_name = '" .$f[0]->folder_name."'";
                  if($filter!="ALL")$where = $where ." and month(create_date)='".$filter."'";
                  if($year!="ALL")$where = $where ." and year(create_date)='".$year."'";

                  $this->folder->set_table("nota_custom_view");
                  $this->folder->set_where($where);
                      
                  $this->data["isi_folder"] = $this->folder->tampil();
                       
                     if($f[0]->folder_name=="archive")
                        $this->load->view("content/notadinas/archive", $this->data);

                        else
                        $this->load->view("content/notadinas/custom_folder", $this->data);
      	         }
        }
           function submit_nota($emp_num){
                  $this->nota->creator = $emp_num;
                  $nota_id = kode_nota();
                 $this->nota->nota_id = $nota_id;
                  $this->nota->set_values();
                  $this->nota->simpan();

                  $referensi = $this->input->post('referensi');
                  $referensi = substr($referensi, 0, strlen($referensi));
                  $referensi = explode(",", $referensi);
                  $this->referensi->set_where(array("nota_id"=>$nota_id));
                  $this->referensi->hapus(); 
                  if($referensi[0]!=""){
                    for($i=0;$i<count($referensi);$i++){
                       $this->referensi->nota_id = $nota_id;
                       $this->referensi->referensi_id = $referensi[$i];
                       $this->referensi->set_values();
                       $this->referensi->simpan();
                    }
                  }
                  $kepada = $this->input->post('kepada');
                  $kepada = substr($kepada, 0, strlen($kepada));
                  $kepada = explode(",", $kepada); 
                  for($i=0;$i<count($kepada);$i++){
                     $this->penerima->nota_id = $nota_id;
                     $this->penerima->emp_num = $kepada[$i];
                     $this->penerima->emp_from =  $this->input->post("nota_sender");
                     $this->penerima->set_values();
                     $this->penerima->simpan();
                  }

                  $tembusan = $this->input->post('tembusan');
                  $tembusan = substr($tembusan, 0, strlen($tembusan));
                  $tembusan = explode(",", $tembusan);
                  if($tembusan[0]!=""){
                  for($i=0;$i<count($tembusan);$i++){
                     $this->penerima->nota_id = $nota_id;
                     $this->penerima->emp_num = $tembusan[$i];
                     $this->penerima->cc_status = "1";
                     $this->penerima->emp_from = $this->input->post("nota_sender");;
                     $this->penerima->set_values();
                     $this->penerima->simpan();
                  }
                }
                  $pemeriksa = $this->input->post('pemeriksa');
                  $pemeriksa = substr($pemeriksa, 0, strlen($pemeriksa));
                  $pemeriksa = explode(",", $pemeriksa);
                 
                  $i=0;
                     $this->pemeriksa->nota_id = $nota_id;
                     $this->pemeriksa->examiner_id = $emp_num;
                     $this->pemeriksa->exam_queue = $i;
                     $this->pemeriksa->status = "AKTIF";
                     $this->pemeriksa->read_status = 1;
                     $this->pemeriksa->ok_status = 1;
                     $this->pemeriksa->status = "AKTIF";
                     $this->pemeriksa->set_values();
                     $this->pemeriksa->simpan();
                  for($i=0;$i<count($pemeriksa);$i++){

                     $this->pemeriksa->nota_id = $nota_id;
                     $this->pemeriksa->examiner_id = $pemeriksa[$i];
                     $this->pemeriksa->exam_queue = $i+1;
                     $this->pemeriksa->read_status = 0;
                     $this->pemeriksa->ok_status = 0;
                     if($i+1 == 1) {
                      $this->pemeriksa->status = "AKTIF";
                        $this->notifikasi->notif_link = $nota_id;
                        $this->notifikasi->emp_num = $pemeriksa[$i];
                        $this->notifikasi->notif_type = "7";
                        $this->notifikasi->notif_desc = "Nota Dinas Dengan ID ".$nota_id." Perlu Di Proses";
                        $this->notifikasi->set_values();
                        $this->notifikasi->simpan();
                     }
                     else $this->pemeriksa->status = "TIDAK AKTIF";
                     $this->pemeriksa->set_values();
                     $this->pemeriksa->simpan();
                        $where = array("emp_num"=>$pemeriksa[$i],"folder_name"=>"progress");
                        $this->folder->set_where($where);
                        $folder = $this->folder->tampil();
                        $this->folder_mapping->nota_id = $nota_id;
                        $this->folder_mapping->folder_id = $folder[0]->folder_id;
                        $this->folder_mapping->set_values();
                        $this->folder_mapping->simpan();
                    }
                    

                  $komentar = $this->input->post("komentar");
                  if ($komentar!=""){
                      $this->komentar->komentar = $komentar;
                      $this->komentar->emp_num = $emp_num;
                      $this->komentar->nota_id =$nota_id;
                      $this->komentar->set_values();
                      $this->komentar->simpan();
                 }
                $this->data["pesan"]=$nota_id;
              $this->load->view("content/notadinas/pesan",$this->data);
           }

           function submit_edit_draft($emp_num,$nota_id){

                  $where = array("nota_id"=>$nota_id);
                  
                  $referensi = $this->input->post('referensi');
                  $this->pemeriksa->set_where($where);
                  $this->pemeriksa->hapus();
                  $referensi = substr($referensi, 0, strlen($referensi));
                  $referensi = explode(",", $referensi);
                  $this->referensi->set_where(array("nota_id"=>$nota_id));
                  $this->referensi->hapus(); 
                  if($referensi[0]!=""){
                    for($i=0;$i<count($referensi);$i++){
                       $this->referensi->nota_id = $nota_id;
                       $this->referensi->referensi_id = $referensi[$i];
                       $this->referensi->set_values();
                       $this->referensi->simpan();
                    }
                  }
                  

                  $this->nota->set_values();
                  $this->nota->set_where($where);
                  
                  $this->nota->update();
                  $this->penerima->set_where($where);
                  $this->penerima->hapus();
                  $kepada = $this->input->post('kepada');
                  $kepada = substr($kepada, 0, strlen($kepada));
                  $kepada = explode(",", $kepada); 
                  for($i=0;$i<count($kepada);$i++){
                     $this->penerima->nota_id = $nota_id;
                     $this->penerima->emp_num = $kepada[$i];
                     $this->penerima->emp_from = $this->aktif_user->emp_num;
                     $this->penerima->set_values();
                     $this->penerima->simpan();
                  }
                  $tembusan = $this->input->post('tembusan');
                  $tembusan = substr($tembusan, 0, strlen($tembusan));
                  $tembusan = explode(",", $tembusan);
                  if($tembusan[0]!=""){
                  for($i=0;$i<count($tembusan);$i++){
                     $this->penerima->nota_id = $nota_id;
                     $this->penerima->emp_num = $tembusan[$i];
                     $this->penerima->cc_status = "1";
                     $this->penerima->emp_from = $this->aktif_user->emp_num;
                     $this->penerima->set_values();
                     $this->penerima->simpan();
                  }
                }
                  $pemeriksa = $this->input->post('pemeriksa');
                  $pemeriksa = substr($pemeriksa, 0, strlen($pemeriksa));
                  $pemeriksa = explode(",", $pemeriksa);
                 
                  $i=0;
                     $this->pemeriksa->nota_id = $nota_id;
                     $this->pemeriksa->examiner_id = $emp_num;
                     $this->pemeriksa->exam_queue = $i;
                     $this->pemeriksa->status = "AKTIF";
                     $this->pemeriksa->read_status = 1;
                     $this->pemeriksa->ok_status = 1;
                     $this->pemeriksa->status = "AKTIF";
                     $this->pemeriksa->set_values();
                     $this->pemeriksa->simpan();
                  for($i=0;$i<count($pemeriksa);$i++){

                     $this->pemeriksa->nota_id = $nota_id;
                     $this->pemeriksa->examiner_id = $pemeriksa[$i];
                     $this->pemeriksa->exam_queue = $i+1;
                     $this->pemeriksa->read_status = 0;
                     $this->pemeriksa->ok_status = 0;
                     if($i+1 == 1) {
                      $this->pemeriksa->status = "AKTIF";
                        $this->notifikasi->notif_link = $nota_id;
                        $this->notifikasi->emp_num = $pemeriksa[$i];
                        $this->notifikasi->notif_type = "7";
                        $this->notifikasi->notif_desc = "Nota Dinas Dengan ID ".$nota_id." Perlu Di Proses";
                        $this->notifikasi->set_values();
                        $this->notifikasi->simpan();
                     }
                     else $this->pemeriksa->status = "TIDAK AKTIF";
                     $this->pemeriksa->set_values();
                     $this->pemeriksa->simpan();
                        $where = array("emp_num"=>$pemeriksa[$i],"folder_name"=>"progress");
                        $this->folder->set_where($where);
                        $folder = $this->folder->tampil();
                        $this->folder_mapping->nota_id = $nota_id;
                        $this->folder_mapping->folder_id = $folder[0]->folder_id;
                        $this->folder_mapping->set_values();
                        $this->folder_mapping->simpan();
                    }

                  $komentar = $this->input->post("komentar");
                  if ($komentar!=""){
                      $this->komentar->komentar = $komentar;
                      $this->komentar->emp_num = $emp_num;
                      $this->komentar->nota_id =$nota_id;
                      $this->komentar->set_values();
                      $this->komentar->simpan();
                 }
               delete_draft($nota_id,$emp_num);
                $this->data["pesan"]=$nota_id;
              $this->load->view("content/notadinas/pesan",$this->data);
           }

           function submit_draft($emp_num){
                  $this->nota->creator = $emp_num;
                  $nota_id = kode_nota();
                  $this->nota->nota_id = $nota_id;
                  $this->nota->set_values();
                  $this->nota->simpan();
                   $referensi = $this->input->post('referensi');
                  $referensi = substr($referensi, 0, strlen($referensi));
                  $referensi = explode(",", $referensi);
                  $this->referensi->set_where(array("nota_id"=>$nota_id));
                  $this->referensi->hapus();    
                 
                  if($referensi[0]!=""){
                    for($i=0;$i<count($referensi);$i++){
                       $this->referensi->nota_id = $nota_id;
                       $this->referensi->referensi_id = $referensi[$i];
                       $this->referensi->set_values();
                       $this->referensi->simpan();
                    }
                  }
                   $pemeriksa = $this->input->post('pemeriksa');
                  $pemeriksa = substr($pemeriksa, 0, strlen($pemeriksa));
                  $pemeriksa = explode(",", $pemeriksa);
                  if($pemeriksa!=""){
                  for($i=0;$i<count($pemeriksa);$i++){
                     $this->pemeriksa->nota_id = $nota_id;
                     $this->pemeriksa->examiner_id = $pemeriksa[$i];
                     $this->pemeriksa->exam_queue = $i+1;
                     $this->pemeriksa->read_status = 0;
                     $this->pemeriksa->ok_status = 0;
                      $this->pemeriksa->status = "TIDAK AKTIF";
                     $this->pemeriksa->set_values();
                     $this->pemeriksa->simpan();
                      
                    }
                    }

                  $kepada = $this->input->post('kepada');
                  $kepada = substr($kepada, 0, strlen($kepada));
                  $kepada = explode(",", $kepada);
                  if($kepada[0]!=""){
                    for($i=0;$i<count($kepada);$i++){
                       $this->penerima->nota_id = $nota_id;
                       $this->penerima->emp_num = $kepada[$i];
                     $this->penerima->emp_from = $this->input->post("nota_sender");
                       $this->penerima->set_values();
                       $this->penerima->simpan();
                    }
                  }
                  $tembusan = $this->input->post('tembusan');
                  $tembusan = substr($tembusan, 0, strlen($tembusan));
                  $tembusan = explode(",", $tembusan);
                  if($tembusan[0]!=""){
                  
                  for($i=0;$i<count($tembusan);$i++){
                     $this->penerima->nota_id = $nota_id;
                     $this->penerima->emp_num = $tembusan[$i];
                     $this->penerima->cc_status = "1";
                     $this->penerima->emp_from =  $this->input->post("nota_sender");

                     $this->penerima->set_values();
                     $this->penerima->simpan();
                  }
                }
                   $where = array("emp_num"=>$emp_num,"folder_name"=>"draft");
                        $this->folder->set_where($where);
                        $folder = $this->folder->tampil();
                        $this->folder_mapping->nota_id = $nota_id;
                        $this->folder_mapping->folder_id = $folder[0]->folder_id;
                        $this->folder_mapping->set_values();
                        $this->folder_mapping->simpan();

                  $this->data['pesan'] = $nota_id;
                  $this->load->view("content/notadinas/pesan",$this->data);
           }

              function simpan_draft($emp_num,$nota_id){

                   $where = array("nota_id"=>$nota_id);
                   
                  $referensi = $this->input->post('referensi');
                  $referensi = substr($referensi, 0, strlen($referensi));
                  $referensi = explode(",", $referensi);
                  $this->referensi->set_where(array("nota_id"=>$nota_id));
                  $this->referensi->hapus();    
                 
                  if($referensi[0]!=""){
                    for($i=0;$i<count($referensi);$i++){
                       $this->referensi->nota_id = $nota_id;
                       $this->referensi->referensi_id = $referensi[$i];
                       $this->referensi->set_values();
                       $this->referensi->simpan();
                    }
                  }
                  $this->pemeriksa->set_where(array("nota_id"=>$nota_id));
                  $this->pemeriksa->hapus();    

                  $pemeriksa = $this->input->post('pemeriksa');
                  $pemeriksa = substr($pemeriksa, 0, strlen($pemeriksa));
                  $pemeriksa = explode(",", $pemeriksa);
                  if($pemeriksa!=""){
                  for($i=0;$i<count($pemeriksa);$i++){
                     $this->pemeriksa->nota_id = $nota_id;
                     $this->pemeriksa->examiner_id = $pemeriksa[$i];
                     $this->pemeriksa->exam_queue = $i+1;
                     $this->pemeriksa->read_status = 0;
                     $this->pemeriksa->ok_status = 0;
                      $this->pemeriksa->status = "TIDAK AKTIF";
                     $this->pemeriksa->set_values();
                     $this->pemeriksa->simpan();
                    }
                    }

              
                  
                   $this->nota->set_where($where);
                  $this->nota->creator = $emp_num;
                  $this->nota->set_values();
                  $this->nota->update();
                 $this->penerima->set_where($where);
                 $this->penerima->hapus();
                  $kepada = $this->input->post('kepada');
                  $kepada = substr($kepada, 0, strlen($kepada));
                  $kepada = explode(",", $kepada);
                  if($kepada[0]!=""){
                    for($i=0;$i<count($kepada);$i++){
                       $this->penerima->nota_id = $nota_id;
                       $this->penerima->emp_num = $kepada[$i];
                     $this->penerima->emp_from =  $this->input->post("nota_sender");
                       $this->penerima->set_values();
                       $this->penerima->simpan();
                    }
                  }
                  $tembusan = $this->input->post('tembusan');
                  $tembusan = substr($tembusan, 0, strlen($tembusan));
                  $tembusan = explode(",", $tembusan);
                  if($tembusan[0]!=""){
                  
                  for($i=0;$i<count($tembusan);$i++){
                     $this->penerima->nota_id = $nota_id;
                     $this->penerima->emp_num = $tembusan[$i];
                     $this->penerima->cc_status = "1";
                     $this->penerima->emp_from =  $this->input->post("nota_sender");

                     $this->penerima->set_values();
                     $this->penerima->simpan();
                  }
                }

                  $this->data['pesan'] = $nota_id;
                  $this->load->view("content/notadinas/pesan",$this->data);
           }
           function nota_det($nota_id){
              $where = array("nota_id"=>$nota_id);
              $this->referensi->set_where($where);
              $this->referensi->set_table("view_nota_referensi");
              $this->data["referensi"]=$this->referensi->tampil();
              $this->nota->set_where($where);
                $this->nota_options->set_where($where);
                $this->data["options"] = $this->nota_options->tampil();
              $this->nota->set_table("nota_inbox_view");
              $this->lampiran->set_where($where);
              $this->data["nota"] = $this->nota->tampil();
              $this->tampilan->set_table("view_nota_kepada");
              $this->tampilan->set_where($where);
              $this->tampilan->set_order("nota_id asc");
              $this->data["kepada"] = $this->tampilan->tampil();
              $this->tampilan->set_table("view_nota_tembusan");
              $this->tampilan->set_where($where);
              $this->data["tembusan"] = $this->tampilan->tampil();
              $where = array("emp_num"=>$this->data["nota"][0]->nota_sender_num);
              $this->pegawai->set_where($where);
              $this->pegawai->set_table("view_nota_employees");

              $this->data["dari"] = $this->pegawai->tampil();
              $this->data["lampiran"] = $this->lampiran->tampil();
              $this->tampilan->set_where(array("nota_id"=>$nota_id,"emp_num"=>$this->aktif_user->emp_num));
              $this->tampilan->set_table("view_nota_disposisi");
              $tindakan = $this->tampilan->tampil();
              $where = array("notif_link"=>$nota_id, "emp_num"=>$this->aktif_user->emp_num,"notif_type"=>8);
              $this->notifikasi->set_where($where);
              $this->notifikasi->values = array("status" => 1);
              $this->notifikasi->update();

              if(count($tindakan)>0){
                  $this->data["terdisposisi"]=true;
                  $where = array("nota_id"=>$nota_id,"nota_tindakan"=>$tindakan[0]->nota_tindakan);
                  $this->tampilan->set_where($where);
                  $this->data["disposisi"]=$this->tampilan->tampil();
                  $this->data["tindakan"]=$tindakan[0]->nota_tindakan;
                  $where = array("nota_id"=>$nota_id,"emp_num"=>$this->aktif_user->emp_num,"nota_tindakan"=>$tindakan[0]->nota_tindakan);
                  $this->tampilan->set_where($where);
                  $this->data["my_disposisi"]=$this->tampilan->tampil();
                 
                
              }

              $this->load->view("content/notadinas/nota_detail",$this->data);
           }
           function sent_det($nota_id){
              $where = array("nota_id"=>$nota_id);
              $this->referensi->set_where($where);
              $this->referensi->set_table("view_nota_referensi");
               $this->komentar->set_where($where);
              $this->komentar->set_table("view_komen_detail");
              $this->data["komentar"] = $this->komentar->tampil();
              $this->data["referensi"]=$this->referensi->tampil();
                $this->nota_options->set_where($where);
                $this->data["options"] = $this->nota_options->tampil();
              $this->nota->set_where($where);
              $this->lampiran->set_where($where);
              $this->data["nota"] = $this->nota->tampil();
              $this->tampilan->set_table("view_nota_kepada");
              $this->tampilan->set_where($where);
              $this->tampilan->set_order("nota_id asc");
              $this->data["kepada"] = $this->tampilan->tampil();
              $this->tampilan->set_table("view_nota_tembusan");
              $this->tampilan->set_where($where);
              $this->data["tembusan"] = $this->tampilan->tampil();
              $where = array("emp_num"=>$this->data["nota"][0]->nota_sender_num);
              $this->pegawai->set_where($where);
              $this->data["dari"] = $this->pegawai->tampil();
              $this->data["lampiran"] = $this->lampiran->tampil();
              $this->load->view("content/notadinas/sent_detail",$this->data);
           }
           function add_komen($emp_num,$nota_id){
               $komentar = $this->input->post("komentar");
                  if ($komentar!=""){
                      $this->komentar->komentar = $komentar;
                      $this->komentar->emp_num = $emp_num;
                      $this->komentar->nota_id =$nota_id;
                      $this->komentar->set_values();
                      $this->komentar->simpan();
                 }
           }
          
           function nota_det_prog($nota_id,$examiner_id){
              $where = array("nota_id"=>$nota_id);
              $this->nota->set_where($where);
              $this->referensi->set_where($where);
              $this->referensi->set_table("view_nota_referensi");
              $this->data["referensi"]=$this->referensi->tampil();
                $this->nota_options->set_where($where);
                $this->data["options"] = $this->nota_options->tampil();
              $this->komentar->set_where($where);
              $this->komentar->set_table("view_komen_detail");
              $this->lampiran->set_where($where);
              $this->data["nota"] = $this->nota->tampil();
              $this->tampilan->set_table("view_nota_kepada");
              $this->tampilan->set_where($where);
              $this->tampilan->set_order("nota_id asc");
              $this->data["kepada"] = $this->tampilan->tampil();
              $this->tampilan->set_table("view_nota_tembusan");
              $this->tampilan->set_where($where);
              $this->data["tembusan"] = $this->tampilan->tampil();
              $this->komentar->set_where($where);
              $this->data["komentar"] = $this->komentar->tampil();
              $where = array("emp_num"=>$this->data["nota"][0]->nota_sender_num);
              $this->pegawai->set_where($where);
              $this->data["dari"] = $this->pegawai->tampil();
              $this->data["komentar"] = $this->komentar->tampil();
              $value = array("read_status"=>1);
              $where = array("examiner_id"=>$examiner_id,"nota_id"=>$nota_id);
              $this->pemeriksa->values = $value;
              $this->pemeriksa->set_where($where);
              $this->pemeriksa->set_order("examine_id asc");
              $this->pemeriksa->update();
              $this->data["lampiran"] = $this->lampiran->tampil();
              $this->data["pemeriksa"]=$this->pemeriksa->tampil();
              
              $where = array("nota_id"=>$nota_id);
              $this->pemeriksa->set_where($where);
              $this->pemeriksa->set_table("nota_progress_view");

              $this->data["semua_pemeriksa"]=$this->pemeriksa->tampil();
              $where = array("notif_link"=>$nota_id, "emp_num"=>$this->aktif_user->emp_num,"notif_type"=>7);
              $this->notifikasi->set_where($where);
              $this->notifikasi->values = array("status" => 1);
              $this->notifikasi->update();
              $this->load->view("content/notadinas/progress_detail",$this->data);
           }

           public function progress_ok($examine_id){
             $value = array("ok_status"=>1);
              $where = array("examine_id"=>$examine_id);
              $this->pemeriksa->values = $value;
              $this->pemeriksa->set_where($where);
              $this->pemeriksa->update();
              $pemeriksa = $this->pemeriksa->tampil();
              $nota_id = $pemeriksa[0]->nota_id;
              $where = array("nota_id"=>$nota_id);
              $this->pemeriksa->set_where($where);
              $semua_pemeriksa = $this->pemeriksa->tampil();
              $jml_pemeriksa = $this->pemeriksa->count();
              if($pemeriksa[0]->exam_queue==$jml_pemeriksa-1){
                $where = array("nota_id"=>$nota_id);
                $values = array("sent_status"=>"1");
                $this->pemeriksa->values = $values;
                $this->pemeriksa->set_where($where);
                $this->pemeriksa->update();
                $where = array("nota_id"=>$nota_id);
                $this->nota->set_where($where);
                $nota=$this->nota->tampil();
                  $nota = $nota[0];
                    $data["nota_number"] = generate_nomor_nota($nota);
                  $this->nota->values = $data;
                  $this->nota->update();
                
                $pemerik = $this->pemeriksa->tampil();
                $this->penerima->set_where(array("nota_id"=>$nota_id));
                $pem = $this->penerima->tampil();
                foreach ($pem as $p) {
                   $where = array("emp_num"=>$p->emp_num,"folder_name"=>"inbox");
                   $this->folder->set_where($where);
                   $fol = $this->folder->tampil();
                   $folder_id = $fol[0]->folder_id;
                   $this->folder_mapping->folder_id = $folder_id;
                   $this->folder_mapping->nota_id = $nota_id;
                   $this->folder_mapping->set_values();
                   $this->folder_mapping->simpan();
                        $this->notifikasi->notif_link = $nota_id;
                        $this->notifikasi->emp_num = $p->emp_num;
                        $this->notifikasi->notif_type = "8";
                        $this->notifikasi->notif_desc = "Nota Dinas Masuk,ID ".$nota_id."";
                        $this->notifikasi->set_values();
                        $this->notifikasi->simpan();
                }

                foreach ($semua_pemeriksa as $p) {
                  $where = array("emp_num"=>$p->examiner_id,"folder_name"=>"sent");
                   $this->folder->set_where($where);
                   $fol = $this->folder->tampil();
                   $folder_id = $fol[0]->folder_id;
                   $this->folder_mapping->folder_id = $folder_id;
                   $this->folder_mapping->nota_id = $nota_id;
                   $this->folder_mapping->set_values();
                   $this->folder_mapping->simpan();
                }
              }
              else{
                $where = array('exam_queue' => $pemeriksa[0]->exam_queue + 1,'nota_id'=>$nota_id );
                $this->pemeriksa->set_where($where);
                $this->pemeriksa->values=array("reject_status"=>0,"ok_status"=>0,"return_status"=>0,"status"=>"AKTIF");
                $this->pemeriksa->update();
                $pemeriksa_notif =$this->pemeriksa->tampil();
                $this->notifikasi->notif_link = $nota_id;
                $this->notifikasi->emp_num = $pemeriksa_notif[0]->examiner_id;
                $this->notifikasi->notif_type = "7";
                $this->notifikasi->notif_desc = "Nota Dinas Dengan ID ".$nota_id." Perlu Di Proses";
                $this->notifikasi->set_values();
                $this->notifikasi->simpan();
              }
              $this->data["pesan"] = "Approved";
              $this->load->view("content/notadinas/pesan",$this->data);
           }
           

           public function progress_return($examine_id){
              $value = array("return_status"=>1);
              $where = array("examine_id"=>$examine_id);
              $this->pemeriksa->values = $value;
              $this->pemeriksa->set_where($where);
              $this->pemeriksa->update();
              $pemeriksa = $this->pemeriksa->tampil();
              $nota_id = $pemeriksa[0]->nota_id;
                $where = array('exam_queue' => $pemeriksa[0]->exam_queue - 1,'nota_id'=>$nota_id );
                $this->pemeriksa->set_where($where);
                $this->pemeriksa->values=array("reject_status"=>0,"ok_status"=>0,"return_status"=>0,"read_status"=>0,"status"=>"AKTIF");
                $this->pemeriksa->update();
              $pem = $this->pemeriksa->tampil();
                 $this->notifikasi->notif_link = $nota_id;
                        $this->notifikasi->emp_num = $pem[0]->examiner_id;
                        $this->notifikasi->notif_type = "7";
                        $this->notifikasi->notif_desc = "Nota Dinas Telah Di return, ID ".$nota_id." oleh ".$this->aktif_user->emp_firstname."/".$this->aktif_user->job_code."/".$this->aktif_user->org_code;
                        $this->notifikasi->set_values();
                        $this->notifikasi->simpan();

              $this->data["pesan"] = "Returned";
              $this->load->view("content/notadinas/pesan",$this->data);
           }
           public function progress_reject($examine_id){
              $value = array("reject_status"=>1,"read_status"=>0);
              $where = array("examine_id"=>$examine_id);
              $this->pemeriksa->values = $value;
              $this->pemeriksa->set_where($where);
              $this->pemeriksa->update();
              $pem = $this->pemeriksa->tampil();
              if(count($pem)>0){
              $where=array("nota_id"=>$pem[0]->nota_id);
              $this->pemeriksa->set_where($where);
              $pem = $this->pemeriksa->tampil();
              $nota_id = $pem[0]->nota_id;
              foreach ($pem as $p) {
                 $value = array("reject_status"=>1,"read_status"=>0);
              $where = array("examine_id"=>$p->examine_id);
              $this->pemeriksa->values = $value;
              $this->pemeriksa->set_where($where);
              $this->pemeriksa->update();
              $nota_id = $p->nota_id;
                 $this->notifikasi->notif_link = $p->nota_id;
                        $this->notifikasi->emp_num = $p->examiner_id;
                        $this->notifikasi->notif_type = "7";
                        $this->notifikasi->notif_desc = "Nota Dinas Telah Di Reject, ID ".$nota_id." oleh ".$this->aktif_user->emp_firstname."/".$this->aktif_user->job_code."/".$this->aktif_user->org_code;
                        $this->notifikasi->set_values();
                        $this->notifikasi->simpan();
              }
              $this->data["pesan"] = "Rejected";
            }
            else{

              $this->data["pesan"] = "Terjadi kesalahan dalam penolakan nota, silahkan cek ulang data nota dinas anda";
            }
              $this->load->view("content/notadinas/pesan",$this->data);
           }
      function hapus_lampiran($id){
         $where = array("lampiran_id"=>$id);
         $this->lampiran->set_where($where);
         $this->lampiran->hapus();
        
      }
      function upload(){
        $nota_id = $this->input->post("notaid");
        $where = array("nota_id"=>$nota_id);
        $this->lampiran->set_where($where);

          $config = array(
            'allowed_types' => '*',
            'upload_path' =>'uploads/notadinas/',
            'max_size' => 0,
            'file_name' => $nota_id
        );
          $this->load->library('upload', $config);
        $files = $_FILES;
        $cpt = count($_FILES['nota_att']['name']);
        echo print_r( $cpt);
        for ($i = 0; $i < $cpt; $i++) {

            $_FILES['userfile']['name'] = $files['nota_att']['name'][$i];
            $_FILES['userfile']['type'] = $files['nota_att']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['nota_att']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $files['nota_att']['error'][$i];
            $_FILES['userfile']['size'] = $files['nota_att']['size'][$i];

            if($this->upload->do_upload('userfile')){
              $this->data = array('upload_data' => $this->upload->data());
              $this->lampiran->nota_id = $nota_id;
              $this->lampiran->lampiran_name = $files['nota_att']['name'][$i];
              $this->lampiran->lampiran_link = $this->data['upload_data']['file_name'];
              $this->lampiran->set_values();
              $this->lampiran->simpan();
            }
            else{
            echo $config["upload_path"];
              $error = array('error' => $this->upload->display_errors());
              echo $error['error'];
            }
        }
      }
          function edit_form($nota_id){
            $where = array("nota_id"=>$nota_id);
              $this->referensi->set_where($where);
              $this->referensi->set_table("view_nota_referensi");
              $this->data["referensi"]=$this->referensi->tampil();
               $this->nota->set_where($where);

                $this->nota_options->set_where($where);
                $this->data["options"] = $this->nota_options->tampil();
            $this->pemeriksa->set_where($where);
            $this->pemeriksa->set_table("nota_progress_view");
            $nota = $this->nota->tampil();
            $this->lampiran->set_where($where);
            $this->data["lampiran"] = $this->lampiran->tampil();
            $this->data["nota"] = $nota[0];
            $this->pemeriksa->set_table("view_nota_examiner");
            $this->pemeriksa->set_order("examine_id asc ");
            $this->data["pemeriksa"] = $this->pemeriksa->tampil();
            $where = array("emp_num"=>$nota[0]->nota_sender_num);
            $this->pegawai->set_where($where);
            $this->pegawai->set_table("view_nota_employees");
            $dari = $this->pegawai->tampil();
            if(count($dari)>0)
                $this->data["dari"] =$dari[0];  
            $this->data["masalah"] = $this->kode_masalah->tampil();
            $where = array("nota_id"=>$nota_id);
            $this->pegawai->set_table("view_nota_kepada");
            $this->pegawai->set_where($where);
            $this->data["kepada"] =$this->pegawai->tampil(); 
            $this->pegawai->set_table("view_nota_tembusan");
            $this->pegawai->set_where($where);
            $this->data["tembusan"] =$this->pegawai->tampil(); 
            $this->load->view("content/notadinas/form_edit",$this->data);

          }
          function edit_form_prog($nota_id){
            $where = array("nota_id"=>$nota_id);
            $this->referensi->set_where($where);
            $this->referensi->set_table("view_nota_referensi");
            $this->data["referensi"]=$this->referensi->tampil();
            $this->nota->set_where($where);
            $this->nota_options->set_where($where);
            $this->data["options"] = $this->nota_options->tampil();
            $this->pemeriksa->set_where($where);
            $this->pemeriksa->set_table("nota_progress_view");
            $nota = $this->nota->tampil();
            $this->lampiran->set_where($where);
            $this->data["lampiran"] = $this->lampiran->tampil();
            $this->data["nota"] = $nota[0];
            $this->pemeriksa->set_table("view_nota_examiner");
            $this->pemeriksa->set_order("examine_id asc");
            $this->data["pemeriksa"] = $this->pemeriksa->tampil();
            $where = array("emp_num"=>$nota[0]->nota_sender_num);
            $this->pegawai->set_where($where);
            $this->pegawai->set_table("view_nota_employees");
            $dari = $this->pegawai->tampil();
            if(count($dari)>0)
                $this->data["dari"] =$dari[0];  
            $this->data["masalah"] = $this->kode_masalah->tampil();
                 
            $where = array("nota_id"=>$nota_id);
            $this->pegawai->set_table("view_nota_kepada");
            $this->pegawai->set_where($where);
            $this->data["kepada"] =$this->pegawai->tampil(); 
            $this->pegawai->set_table("view_nota_tembusan");
            $this->pegawai->set_where($where);
            $this->data["tembusan"] =$this->pegawai->tampil(); 
            $this->load->view("content/notadinas/form_edit_progress",$this->data);

          }
          
          function delete_draft($nota_id,$emp_num){
            $where = array("folder_name"=>"draft","emp_num"=>$emp_num);
            $this->folder->set_where($where);
            $folder = $this->folder->tampil();
            if(count($folder)>0){
              $where = array("nota_id"=>$nota_id,"folder_id"=>$folder[0]->folder_id);
              $this->folder_mapping->set_where($where);
              $this->folder_mapping->hapus();
            }

          }
          
              function simpan_progress($nota_id){
                  $this->nota->set_values();
                                     $where = array("nota_id"=>$nota_id);
                  $this->nota->set_where($where);
                  $this->nota->update();
                 $this->penerima->set_where($where);
                 $this->penerima->hapus();
                  $kepada = $this->input->post('kepada');
                  $kepada = substr($kepada, 0, strlen($kepada));
                  $kepada = explode(",", $kepada);
                  if($kepada[0]!=""){
                    for($i=0;$i<count($kepada);$i++){
                       $this->penerima->nota_id = $nota_id;
                       $this->penerima->emp_num = $kepada[$i];
                     $this->penerima->emp_from = $this->aktif_user->emp_num;
                       $this->penerima->set_values();
                       $this->penerima->simpan();
                    }
                  }
                    $referensi = $this->input->post('referensi');
                  $referensi = substr($referensi, 0, strlen($referensi));
                  $referensi = explode(",", $referensi);
                  $this->referensi->set_where(array("nota_id"=>$nota_id));
                  $this->referensi->hapus(); 
                  if($referensi[0]!=""){
                    for($i=0;$i<count($referensi);$i++){
                       $this->referensi->nota_id = $nota_id;
                       $this->referensi->referensi_id = $referensi[$i];
                       $this->referensi->set_values();
                       $this->referensi->simpan();
                    }
                  }
                  $tembusan = $this->input->post('tembusan');
                  $tembusan = substr($tembusan, 0, strlen($tembusan));
                  $tembusan = explode(",", $tembusan);

                  if($tembusan[0]!=""){
                  
                  for($i=0;$i<count($tembusan);$i++){
                     $this->penerima->nota_id = $nota_id;
                     $this->penerima->emp_num = $tembusan[$i];
                     $this->penerima->cc_status = "1";
                     $this->penerima->emp_from = $this->aktif_user->emp_num;

                     $this->penerima->set_values();
                     $this->penerima->simpan();
                  }
                }

                  $this->data['pesan'] = $nota_id;
                  $this->load->view("content/notadinas/pesan",$this->data);
           }
       
           function print_nota($nota_id){
             $where = array("nota_id"=>$nota_id);
                $this->nota_options->set_where($where);
                $this->data["options"] = $this->nota_options->tampil();
              $this->nota->set_where($where);
              $this->lampiran->set_where($where);
              $this->data["nota"] = $this->nota->tampil();
              $this->tampilan->set_table("view_nota_kepada");
              $this->tampilan->set_where($where);
              $this->tampilan->set_order("nota_id asc");
              $this->data["kepada"] = $this->tampilan->tampil();
              $this->tampilan->set_table("view_nota_tembusan");
              $this->tampilan->set_where($where);
              $this->data["tembusan"] = $this->tampilan->tampil();
              $where = array("emp_num"=>$this->data["nota"][0]->nota_sender_num);
              $this->pegawai->set_where($where);
              $this->data["dari"] = $this->pegawai->tampil();
              $this->data["lampiran"] = $this->lampiran->tampil();
              $this->load->view("content/notadinas/print",$this->data);
           }
          function add_folder(){
              $this->folder->folder_name = $this->input->post("folder_name");
              $this->folder->emp_num = $this->aktif_user->emp_num;
              $this->folder->set_values();
              $this->folder->simpan();
          }
          function copy_folder($folder_id,$nota_id){
            $this->folder_mapping->nota_id = $nota_id;
            $this->folder_mapping->folder_id = $folder_id;
            $this->folder_mapping->set_values();
            $this->folder_mapping->simpan();
          }
          function employe_json($nama=null){
            $where = array("emp_firstname"=>$nama,"emp_lastname"=>$nama);
            $this->pegawai->set_table("view_nota_employees");
            $this->pegawai->set_like($where);
            echo $this->pegawai->tampil_json();
          }
          function employe_json_jabatan($nama=null){
            $where = array("job_name"=>$nama);
            $this->pegawai->set_table("view_nota_employees");
            $this->pegawai->set_like($where);
            echo $this->pegawai->tampil_json();
          }
          function get_all_atasan(){

             $data = $this->pemeriksa->get_all_atasan($this->aktif_user->emp_num);
          }
          function get_all_atasan_json(){
             $data = $this->pemeriksa->get_all_atasan($this->aktif_user->emp_num);
          }
          function hapus_folder($id){
            $where = array("folder_id"=>$id);
            $this->folder->set_where($where);
            $folder = $this->folder->tampil();
            if(count($folder)>0){
              $where = array("nota_id"=>$nota_id,"folder_id"=>$id);
              $this->folder_mapping->set_where($where);
              $this->folder_mapping->hapus();
            }
            $this->folder->hapus();
          }
        function hapus_nota_folder($id){
          $where = array("mapping_id"=>$id);
              $this->folder_mapping->set_where($where);
              $this->folder_mapping->hapus();
        }
        function form_search(){
          $this->load->view("content/notadinas/form_search");
        }
        function search(){
          $order = "create_date ".$this->input->post("urut");
          $cari = $this->input->post("perihal_cari");
          $tahun = $this->input->post("tahun");
          $where = "nota_perihal like '%".$cari."%' and year(create_date) = '".$tahun."' and emp_num ='".$this->aktif_user->emp_num."' and folder_name <>'progress' ";
          $this->tampilan->set_table("nota_custom_view");
          $this->tampilan->set_where($where);
          $this->tampilan->set_order($order);
          $this->data["result"] = $this->tampilan->tampil();
          $this->load->view("content/notadinas/hasil_search",$this->data);
        }
        function disposisi($emp_num,$nota_id){
         $data = $_POST;
         $kepada = $data["disposisi_kepada"];
         $tindakan = $data["nota_tindakan"];
                 for($i=0;$i<count($kepada);$i++){

                     $where = array("emp_num"=>$kepada[$i],"folder_name"=>"inbox");
                    $this->folder->set_where($where);
                   $fol = $this->folder->tampil();
                   $folder_id = $fol[0]->folder_id;
                   $this->folder_mapping->folder_id = $folder_id;
                   $this->folder_mapping->nota_id = $nota_id;
                   $this->folder_mapping->set_values();
                   $this->folder_mapping->simpan();
                        $this->notifikasi->notif_link = $nota_id;
                        $this->notifikasi->emp_num = $kepada[$i];
                        $this->notifikasi->notif_type = "8";
                        $this->notifikasi->notif_desc = "Nota Dinas Masuk,ID ".$nota_id." Disposisi dari ".$this->aktif_user->emp_firstname."/".$this->aktif_user->job_code."/".$this->aktif_user->org_code;
                        $this->notifikasi->set_values();
                        $this->notifikasi->simpan();

                  $values["nota_id"] = $nota_id;
                  $values["emp_num"] = $kepada[$i];
                  $values["disposisi_status"]=1;
                  $values["nota_tindakan"] = $tindakan[$i];

                     $values["emp_from"] = $this->aktif_user->emp_num;
                  $this->tampilan->set_table("nota_receiver");
                  $this->tampilan->values =$values;
                  $this->tampilan->simpan();
                  }
                  echo "Disposisi sudah di kirim!";
        
      }
      function generate_nomor(){
          $where=array("nota_id"=>"201402240002");
          $this->nota->set_where($where);
          $nota=$this->nota->tampil();
          generate_nomor_nota($nota[0]);
      }
      function save_config(){
        $data["nota_id"] = $this->input->post("nota_id_config");
        $data["segera"] =  $this->input->post("segera");
        $data["document_options"] =  $this->input->post("document_options");
        $data["jabatan_pengirim"] = $this->input->post("jabatan_pengirim");
        $data["unit_pengirim"] = $this->input->post("unit_pengirim");
        $data["nama_pengirim"] = $this->input->post("nama_pengirim");
        $data["nik_pengirim"] = $this->input->post("nik_pengirim");
        $data["kota"] = $this->input->post("kota");
        $this->nota_options->set_where(array("nota_id"=>$data["nota_id"]));
        $this->nota_options->hapus();
        $this->nota_options->values = $data;
        $this->nota_options->simpan();
      }
      function copy_ref($nota_id){
         $this->session->set_userdata('nota_id', $nota_id);
         echo $nota_id;
      }
      function paste_ref(){
        $nota_id=  $this->session->userdata("nota_id");
         $this->nota->set_where(array("nota_id"=>$nota_id));
         $json = $this->nota->tampil_json();
         echo $json;
      }
      function search_atasan_jabatan(){ 
         $key = $this->input->post("key");
         echo $this->pemeriksa->get_all_atasan_json($this->aktif_user->emp_num,$key,null);
      }
      function search_atasan_nama(){
         $key = $this->input->post("key");
         echo $this->pemeriksa->get_all_atasan_json($this->aktif_user->emp_num,null,$key);

      }

    }

?>