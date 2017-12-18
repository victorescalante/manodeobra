<?php

class Category_model extends MY_Model
{

	public function all(){
		$query_b = "Select * from categories";
    $query = $this->db->query($query_b);
    return $query->result();
  }

}
