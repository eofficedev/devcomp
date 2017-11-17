<?php
//by sugiantooeoen
//www.sugiantooeoen.com
//database model, model ini akan menurunkan ke model yang berhubungan dengan database akan 
class database extends ci_model{
	public $table;
	protected $where = array();
	protected $like = array();
	protected $order;
	protected $limit;
	protected $uri;
	protected $or_where = array();
	public $values = array();
	public function __construct(){
		parent::__construct();
	}
	public function set_table($table){
		$this->table = $table;
	}
	public function set_order($order){
		$this->order = $order;
	}
	public function set_where($where){
		$this->where= $where;

	}
	public function set_or_where($where){
		$this->or_where= $where;

	}
	public function set_like($like){
		$this->like = $like;
	}
	public function set_limit($limit){
		$this->limit = $limit;
	}
	public function set_uri($uri){
		$this->uri= $uri;
	}

	public function unset_where(){
		$this->where= null;
	}
	public function unset_like(){
		$this->like = null;
	}
	public function unset_limit(){
		$this->limit = $limit;
	}
	public function unset_table(){
		$this->uri= null;
	}
	public function set_values($val){
		$this->values=$val;
	}
	public function simpan(){
		$even = $this->db->insert($this->table,$this->values);
		if($even) return true;
		else return false;
	}
	public function update(){
		$this->db->where($this->where);
		$even = $this->db->update($this->table,$this->values);
		if($even) return true;
		else return false;
	}
	public function tampil(){
		if($this->where) $this->db->where($this->where);
		if($this->like) $this->db->or_like($this->like);
		if($this->or_where) $this->db->or_where($this->or_where);
		$this->db->order_by($this->order);
		$data = $this->db->get($this->table,$this->limit,$this->uri);
		return $data->result();
	}
	public function tampil_json(){
		if($this->where) $this->db->where($this->where);
		if($this->like) $this->db->or_like($this->like);
		if($this->or_where) $this->db->or_where($this->or_where);
		$this->db->order_by($this->order);
		$data = $this->db->get($this->table,$this->limit,$this->uri);
		return json_encode($data->result_array());
	}
	public function hapus(){
		$even = $this->db->delete($this->table,$this->where);
		if($even) return true;
		else return false;
	}
	public function count(){
		if($this->where) $this->db->where($this->where);
		if($this->like) $this->db->or_like($this->like);
		$jml= $this->db->count_all_results($this->table);
		return $jml;	
	}
	public function getdistinct($field){
		$query=$this->db->query("SELECT distinct (".$field.") from ".$this->table);
		return $query->result();
	}
	public function kosong(){
		$this->db->truncate($this->table); 
	}
	public function getIncrement($field){
		$query=$this->db->query("SELECT ".$field." from ".$this->table." order by ".$field." asc");
		$res = $query->result_array();
		$num = 0;
		foreach($res as $key){
			$num = $key[$field];
		}
		$num+=1;
		return $num;
	}

}
?>