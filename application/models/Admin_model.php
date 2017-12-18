<?php

class Admin_model extends MY_Model
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

  public function isAdmin($user_id){
  	$query_b = "select * from users where id = $user_id AND type_user = '1000' limit 1";
  	$query = $this->db->query($query_b);
  	return $query->result();
  }

}
