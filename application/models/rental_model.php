<?php 

class Rental_model extends CI_model{
	public function get_data($table){
		return $this->db->get($table);
	}

	public function insert_data($data,$table){
		$this->db->insert($table,$data);
	}
}

 ?>}
