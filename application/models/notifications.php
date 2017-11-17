<?php

class Notifications extends CI_Model {
    
    /*
     * Function untuk mengambil seluruh notifikasi berdasarkan user/employee yang sedang aktif
     */
    function get_notifications($empnum){
        $this->db->select('A.notif_id,A.notif_desc,A.notif_link,A.notif_type,A.date_post,A.time_post,A.status,B.type_url,B.type_name');
        $this->db->from('hrms_notification as A');
        $this->db->join('hrms_notification_type as B','A.notif_type=B.type_id');
        $this->db->where('A.emp_num',$empnum);
        $this->db->order_by('A.notif_id','desc');
        $this->db->limit(3,0);
        $q = $this->db->get();
        
        return $q;
    }
    
    function get_notifications2($empnum,$num,$offset){
        $this->db->select('A.notif_id,A.notif_desc,A.notif_link,A.notif_type,A.date_post,A.time_post,A.status,B.type_url,B.type_name');
        $this->db->from('hrms_notification as A');
        $this->db->join('hrms_notification_type as B','A.notif_type=B.type_id');
        $this->db->where('A.emp_num',$empnum);
        $this->db->order_by('A.notif_id','desc');
        
        $q = $this->db->get("",$num,$offset);
        
        return $q;
    }
    
    function get_total_notifications($empnum){
        $this->db->select('A.notif_id,A.notif_desc,A.notif_link,A.notif_type,A.date_post,A.time_post,A.status,B.type_url,B.type_name');
        $this->db->from('hrms_notification as A');
        $this->db->join('hrms_notification_type as B','A.notif_type=B.type_id');
        $this->db->where('A.emp_num',$empnum);
        $this->db->order_by('A.notif_id','desc');
        $this->db->limit(3,0);
        
        $q = $this->db->get();
        
        return $q->num_rows();
    }
    
    /*
     * Untuk mengambil URL dari setiap notifications
     * $id = Notification ID
     */
    function get_url_address($id) {
        
        $data = array(
            "status" =>1
        );
        
        $this->db->where('notif_id',$id);
        $this->db->update('hrms_notification',$data);
        
        $this->db->select('A.notif_link,B.type_url');
        $this->db->from('hrms_notification as A');
        $this->db->where('notif_id',$id);
        $this->db->join('hrms_notification_type as B','B.type_id=A.notif_type');
        $q = $this->db->get();
        
        $row = $q->row();
        
        $url = base_url().$row->type_url . $row->notif_link;
        return $url;
    }
    
    /*
     * Function untuk menghapus notifications
     */
    function delete($id){
        $this->db->where('notif_id',$id);
        $q = $this->db->delete('hrms_notification');
        
        if($q) {
            return true;
        }
        else {
            return false;
        }
    }
    
    function delete_all(){
        $this->db->select('emp_id');
        $this->db->from('hrms_user');
        $this->db->where('emp_username',$this->session->userdata('username'));
        $empnum = $this->db->get()->row()->emp_id;
        
        $this->db->where('emp_num',$empnum);
        $q = $this->db->delete('hrms_notification');
        
        return $q;
    }
    
}
