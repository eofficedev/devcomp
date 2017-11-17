<?php
	function kode_nota() {
		$tanggal = date("Ymd");
		$me = get_instance();
		$me->load->model('nota_data',"nota",true);
		$kode = $tanggal."0001";
		$where = array("nota_id"=>$kode);
		$me->nota->set_where($where);
		$jml=$me->nota->count();
		if ($jml==0) {
			return $kode;
		}
		else{
			$me->nota->unset_where();
			$like = array("nota_id"=>$tanggal);
			$me->nota->set_like($like);
			$nota=$me->nota->tampil();
			foreach ($nota as $m) {
				$angka = substr($m->nota_id,8,13);
			}
			$angka = $angka + 1;
			$jumlah = strlen($angka);
			if ($jumlah==1) $angka = "000".$angka;
			elseif ($jumlah==2) $angka = "00".$angka;
			elseif ($jumlah==3) $angka = "0".$angka;
			$kodee = $tanggal.$angka;
			return $kodee;
		}
	}
	function generate_nomor_nota($nota){
		$me = get_instance();
		$me->load->model('nota_config',"nota_config",true);
		$konf = $me->nota_config->tampil();
                  $username = $me->session->userdata('username');
        $where = array("tipe"=>"delimiter");
        $me->nota_config->set_where($where);
        $del = $me->nota_config->tampil();
        if(count($del)>0)
        	$delimiter = $del[0]->value;
        else $delimiter = ""; 
		$emp = $me->employee->get_detail_emp($username);
		$emp = $emp->row();
		$data;
		$i = 1;
		foreach ($konf as $kon) {
			switch($kon->tipe){
				case "auto increment": $data[$kon->id_format_code] = auto_increment();
									break;
				case "unit organisasi":$data[$kon->id_format_code]=$emp->org_code;
									break;
				case "text":$data[$kon->id_format_code]=$kon->value ;
							break;
				case "kode masalah":$data[$kon->id_format_code] = $nota->nota_kode_masalah;
									break;
				case "tanggal":$data[$kon->id_format_code]=date("d");break;
				case "bulan":$data[$kon->id_format_code]=date("m");break;
				case "tahun":$data[$kon->id_format_code]=date("Y");break;
			}
		}
		$me->load->model('notadinas/database',"nota_nomor",true);
		$me->nota_nomor->set_table("nota_nomor");
		foreach ($data as $key => $value) {
			$val = array("format_id"=>$key,"value"=>$value,"nota_id"=>$nota->nota_id);
			$me->nota_nomor->values= $val;
			$me->nota_nomor->simpan();
		}
		$me->nota_nomor->set_table("view_nomor_nota");
		$me->nota_nomor->set_order("urutan asc");
		$me->load->model("notadinas/nota_options","nota_options",true);

		$where=array("nota_id"=>$nota->nota_id);

		$me->nota_nomor->set_where($where);
		$kode="";
		$conf = $me->nota_nomor->tampil();
		foreach ($conf as $no) {
			$kode = $kode. " " . $no->value;
			if ($no->skip_delimiter==0 and count($conf)>$i) $kode =$kode ." ". $delimiter; 
			$i++;
		}
		$me->nota_options->set_where($where);
		$options = $me->nota_options->tampil();
		if(isset($options[0])){
			if($options[0]->document_options=="DOKUMEN RAHASIA") $kode = $kode." RHS";
			else if($options[0]->document_options=="DOKUMEN RAHASIA & PRIBADI")$kode = $kode." RHS-PRIBADI";

		}
		return $kode;
	}
	function auto_increment(){
		$me = get_instance();
		$me->load->model('notadinas/database',"nota_nomor",true);
		$me->nota_nomor->set_table("view_nomor_nota");
		$me->nota_nomor->set_order("format_id asc");
		$jml = $me->nota_nomor->count();
		if($jml==0) return 1;
		else {
			$where = array("tipe"=>"auto increment");
			$me->nota_nomor->set_where($where);
			$me->nota_nomor->set_order("value desc");
			$inc = $me->nota_nomor->tampil();
			return $inc[0]->value + 1;
		}
	}
	function generateKodeCuti(){
		$me = get_instance();
		$me->load->model('notadinas/database',"cuti_config",true);
		$me->cuti_config->set_table("cuti_config");
		$me->cuti_config->set_order("id desc");
		$jml=$me->cuti_config->count();
		if($jml==0) return "0001";
		else{
			$kode = $me->cuti_config->tampil()[0]->kode;
			$kode+=1;
			$jm = strlen($jml);
			if($jm==1)$kode = "000".$kode;
			else if($jm==2)$kode = "00".$kode;
			else if($jm==3)$kode = "0".$kode;
			return $kode;
		}
	}
	function cekOrgId($id){
		if($id=="")
			return FALSE;
		$me = get_instance();
		$me->load->model('notadinas/database',"organisasi",true);
		$me->organisasi->set_table("hrms_organization");
		$me->organisasi->set_order("org_num desc");
		$where["org_id"]=$id;
		$me->organisasi->set_where($where);
		$orgDet = $me->organisasi->tampil();
		if(count($orgDet)>0){

			return FALSE;
		}
		else
			return TRUE;
	}
	function cekJobId($id){
		if($id=="")
			return FALSE;
		$me = get_instance();
		$me->load->model('notadinas/database',"job",true);
		$me->job->set_table("hrms_job");
		$me->job->set_order("job_num desc");
		$where["job_id"]=$id;
		$me->job->set_where($where);
		$jobDet = $me->job->tampil();
		if(count($jobDet)>0)
			return FALSE;
		else
			return TRUE;
	}

?>