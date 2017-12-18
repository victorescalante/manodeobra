<?php

/**
 *
 */
class File_model extends MY_Model
{

  public function forEnterprice($id_enterprice){
		$query = $this->db->get_where('files', array('Enterprice_idEnterprice' => $id_enterprice));
    return $query->result();
	}


  public function forProyect($id_proyect){
		$query = $this->db->get_where('files', array('Proyect_idProyect' => $id_proyect));
    return $query->result();
	}

	public function imagesOfEnterprice($id_enterprice){
		$query = $this->db->get_where('files', array('Enterprice_idEnterprice' => $id_enterprice));
		return $query->result();
	}

	public function imagesOfProyect($id_proyect){
		$query = $this->db->get_where('files', array('Proyect_idProyect' => $id_proyect));
		return $query->result();
	}

  public function imagesActiveOfEnterprice($id_enterprice){
		$query = $this->db->get_where('files', array('Enterprice_idEnterprice' => $id_enterprice,'status_file' => 1));
		return $query->result();
	}

	public function imagesActiveOfProyect($id_proyect){
		$query = $this->db->get_where('files', array('Proyect_idProyect' => $id_proyect,'status_file' => 1));
		return $query->result();
	}


}
