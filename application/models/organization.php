<?php

class Organization extends CI_Model {
    /*
     * Function untuk menampilkan seluruh organization
     */

    function get_all_org() {
        $this->db->select('*');
        $this->db->from('hrms_organization');
        $this->db->where('org_num !=','8');
        if($this->input->post('filter')!=null && $this->input->post('filter')!='0'){
            $filter = $this->input->post('filter');
            $keyword = $this->input->post('keyword');
            $this->db->like(strtolower($filter),  strtolower($keyword));
        }
        
        return $this->db->get();
    }
    
    function get_all_org_name(){
        $this->db->select('org_num,org_name');
        $this->db->from('hrms_organization');
        $this->db->where('org_num !=','8');
        $q = $this->db->get();
        
        return $q;
    }

    /*
     * function untuk menampilkan organization code
     */

    function get_org_code($orgnum) {
        $this->db->select('org_code');
        $this->db->from('hrms_organization');
        $this->db->where('org_num', $orgnum);
        $this->db->where('org_num !=','8');
        $q = $this->db->get();

        $row = $q->row();

        return $row->org_code;
    }

    function load_curr_num() {
        $this->db->select('org_start_num,org_counter_id');
        $this->db->from('hrms_counter');
        $q = $this->db->get();

        $row = $q->row();
        $curr_num = $row->org_start_num + $row->org_counter_id;
        return $curr_num;
    }
    
    function add_org(){
        
        $this->db->select('org_start_num,org_counter_id,job_start_num,job_counter_id');
        $this->db->from('hrms_counter');
        $q4 = $this->db->get();
        $row_counter = $q4->row();
        
//        $sppdnum = $row_counter->org_start_num + $row_counter->org_counter_id;
        
        $data = array(
            'org_id'=> $this->input->post('org_id'),
            'org_name'=>$this->input->post('org_name'),
            'org_code'=>$this->input->post('org_code'),
            'org_address'=>$this->input->post('org_address'),
            'org_email'=>$this->input->post('org_email'),
            'org_work_telp'=>$this->input->post('org_work_telp'),
            'org_fax'=>$this->input->post('org_fax'),
            'org_postal_code'=>$this->input->post('org_postal_code')
        );
        
        if($this->input->post('org_sub')!=""){
            $data['org_sub'] = $this->input->post('org_sub');
        }
        
        $q = $this->db->insert('hrms_organization',$data);
        $orgnum = mysql_insert_id();
        
        $ci =& get_instance();
        $ci->load->model("notadinas/database","jobnya",true);
        $ci->jobnya->set_table("hrms_job");
        $ci->jobnya->set_order("job_num asc");
        $where = array();
        $where["job_id"] = $this->input->post('job_id');
        $ci->jobnya->set_where($where);
        $jobnya = $ci->jobnya->tampil();
        $q2=true;
        if(count($jobnya)==0){
            $data2 = array(
                "job_id"=>$this->input->post('job_id'),
                "job_code"=>$this->input->post('job_code'),
                "job_name"=>$this->input->post('job_name'),
                "job_description" =>$this->input->post('job_description'),
                "org_num"=> $orgnum
            );
            
            $q2 = $this->db->insert('hrms_job',$data2);
            
            $data3 = array(
                "fiatur_job_num" => mysql_insert_id()
            );
        }
        else
            $data3["fiatur_job_num"]=$jobnya[0]->job_num;

        $this->db->where('org_num',$orgnum);
        $q3 = $this->db->update('hrms_organization',$data3);
        
        $counter_job = $row_counter->job_counter_id;
        $counter_org = $row_counter->org_counter_id;
        $counter_job++;
        $counter_org++;
        
        $data4 = array(
            'org_counter_id'=>$counter_org,
            'job_counter_id'=>$counter_job
        );
        
        $this->db->where('id','1');
        $this->db->update('hrms_counter',$data4);
        
        if($q && $q2 && $q3){
            return true;
        }
        else {
            return false;
        }
    }
    
    function get_detail_org($id){
        $this->db->select('A.org_num,A.org_code,A.org_name,A.org_address,A.org_work_telp,A.org_fax,A.org_postal_code,A.org_id,A.org_email,A.org_sub,A.hr_job_num,A.kepala_job_num,B.job_num,B.job_id,B.job_name,B.job_description,B.job_code');
        $this->db->from('hrms_organization as A');
        $this->db->join('hrms_job as B','A.fiatur_job_num=B.job_num');
        $this->db->where('A.org_num',$id);
        
        return $this->db->get();
    }

    function upd_org(){

        $data = array(
            'org_id'=> $this->input->post('org_id'),
            'org_name'=>$this->input->post('org_name'),
            'org_code'=>$this->input->post('org_code'),
            'org_address'=>$this->input->post('org_address'),
            'org_email'=>$this->input->post('org_email'),
            'org_work_telp'=>$this->input->post('org_work_telp'),
            'org_fax'=>$this->input->post('org_fax'),
            'org_postal_code'=>$this->input->post('org_postal_code')
        );
        if($this->input->post('org_sub')!=''){
            $data['org_sub'] = $this->input->post('org_sub');
        }
        
        $this->db->where('org_num',$this->input->post('org_num'));
        $this->db->update('hrms_organization',$data);
        
        $data2 = array(
            "job_id"=>$this->input->post('job_id'),
            "job_code"=>$this->input->post('job_code'),
            "job_name"=>$this->input->post('job_name'),
            "job_description" =>$this->input->post('job_description')
        );

        $ci =& get_instance();
        $ci->load->model("notadinas/database","jobnya",true);
        $ci->jobnya->set_table("hrms_job");
        $ci->jobnya->set_order("job_num asc");
        $where = array();
        $where["job_id"] = $this->input->post('job_id');
        $ci->jobnya->set_where($where);
        $jobnya = $ci->jobnya->tampil();
        $q=true;

        if(count($jobnya)>0){   
            $this->db->where('job_num',$jobnya[0]->job_num);
            $q = $this->db->update('hrms_job',$data2);
            $ci->load->model("notadinas/database","organisasi",true);
            $ci->organisasi->set_table("hrms_organization");
            $ci->organisasi->set_order("org_id asc");
            
             $where= array("org_num"=>$this->input->post('org_num'));
            $ci->organisasi->set_where($where);
            $ci->organisasi->values["fiatur_job_num"]=$jobnya[0]->job_num;
               $ci->organisasi->update();
        }
        else{
            $data2["org_num"]=$this->input->post('org_num');
            $ci->jobnya->values = $data2;
            $ci->jobnya->simpan();
            $jobnya = $ci->jobnya->tampil();
            $ci->load->model("notadinas/database","organisasi",true);
            $ci->organisasi->set_table("hrms_organization");
            $ci->organisasi->set_order("org_id asc");
            $where= array("org_num"=>$this->input->post('org_num'));
            $ci->organisasi->set_where($where);
            $ci->organisasi->values["fiatur_job_num"]=$jobnya[0]->job_num;
               $ci->organisasi->update();
        }
        if($q){
            return true;
        }
    }
    
    function get_first_org(){
        $this->db->select('org_name');
        $this->db->from('hrms_organization');
        $this->db->where('org_num !=','8');
        $this->db->order_by('org_num','ASC');
        $this->db->limit(1,0);
        $orgname = $this->db->get()->row()->org_name;
        
        return $orgname;
    }
    
    function delete_org($orgnum){
        $this->db->where('org_num',$orgnum);
        $q = $this->db->delete('hrms_organization');
        return $q;
    }
}
