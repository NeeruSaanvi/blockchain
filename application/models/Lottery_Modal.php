<?php
class Lottery_Modal extends CI_Model{

	public function insert_funtion($table,$data){

		$user = $this->db->insert($table,$data);
		if($user > 0){
			return true;
		}
		else{
			return false;	
		}
	}

	public function select_data($table){
		$this->db->select("*"); 
		$this->db->from($table);
		$this->db->order_by("result_id","desc");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function select_data_where($table,$where){
		$this->db->select("*"); 
		$this->db->from($table);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function select_data_is_exists($table,$username,$email){
		$this->db->select("*"); 
		$this->db->from($table);
        $where = "(username='$username' or user_email_id = '$email')";
	    $this->db->where($where);
		$query = $this->db->get();
		return $query->result_array();
	}
	

	public function top_ten_record($table){
		$this->db->select("*"); 
		$this->db->from($table);
		$this->db->order_by("result_id","desc");
		$this->db->limit(10,0);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_last_serial_no()
		{   
			$this->db->select("result_serial_no");
			$this->db->from('result');			
			$this->db->order_by("result_id","desc");				
			$this->db->limit(1,0);
			$query = $this->db->get();
			return $query->result_array();
		}				
	
}
?>