<?php

class Service_model extends MY_Model
{
	//public $primary_key = 'id';


	public function all(){
		$query = $this->db->get('services');
		return $query->result();
	}

	public function ofEnterprice($id_enterprice){
		$query = $this->db->get_where('services', array('Enterprice_idEnterprice' => $id_enterprice));
		return $query->result();
	}


}
