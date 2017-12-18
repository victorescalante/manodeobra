<?php

class Proyect_model extends MY_Model
{
	//public $primary_key = 'id';


	public function all(){
		$query = $this->db->get('proyects');
		return $query->result();
	}

	public function where_user($User_id){
		$query = $this->db->get_where('proyects', array('User_idUser' => $User_id));
		return $query->result();
	}

	public function isOfUser($Proyect_id,$User_id){
		$query = $this->db->get_where('proyects', array('User_idUser' => $User_id,'id' => $Proyect_id));
		return $query->result();
	}

	public function ofEnterprice($id_enterprice){
		$query = $this->db->get_where('proyects', array('Enterprice_idEnterprice' => $id_enterprice));
		return $query->result();
	}

}
