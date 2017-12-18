<?php

class Zip_model extends MY_Model
{


	public function find_zip_code($zip_code){
		$query_b = "Select * from codigo where cp = '$zip_code'";
    $query = $this->db->query($query_b);
    return $query->result();
  }


  public function states(){
    $query_b = "SELECT idEstado,estado FROM codigo GROUP BY estado,idEstado";
    $query = $this->db->query($query_b);
    return $query->result();
  }

  public function municipalities($id_state){
    $query_b = "SELECT idMunicipio, municipio FROM codigo WHERE idEstado = '$id_state' GROUP BY municipio,idMunicipio";
    $query = $this->db->query($query_b);
    return $query->result();
  }

  public function cp($id_codigo){
    $querys = "SELECT * FROM codigo WHERE id = $id_codigo";
    $query = $this->db->query($querys);
    return $query->result();
  }


}
