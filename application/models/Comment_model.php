<?php

class Comment_model extends MY_Model
{
	//public $primary_key = 'id';


	public function all(){
		$query = $this->db->get('admins');
		return $query->result();
	}

	public function find_user($criterio){
		$query_b = "Select * from users where first_name = '$criterio'";
    $query = $this->db->query($query_b);
    return $query->result();
  }

}
