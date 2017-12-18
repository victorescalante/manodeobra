<?php

class Enterprice_model extends MY_Model
{
	//public $primary_key = 'id';


	public function all(){
		$query = $this->db->get('enterprices');
		return $query->result();
	}

	public function ofSlug($slug){
		$query = $this->db->get_where('enterprices', array('slug' => $slug));
		return $query->result();
	}


	public function where1($where){
		$query = $this->db->get_where('enterprices', $where);
		return $query->result();
	}

	public function where_user($User_id){
		$query = $this->db->get_where('enterprices', array('User_idUser' => $User_id));
		return $query->result();
	}


	public function isOfUser($Enterprice_id,$User_id){
		$query = $this->db->get_where('enterprices', array('User_idUser' => $User_id,'id' => $Enterprice_id));
		return $query->result();
	}

	public function haveSlug($slug){
		$query = $this->db->get_where('enterprices', array('slug' => $slug));
		$result = $query->result();
		return $result;
	}


	public function where_conditions($category_id,$state_id,$municipality_id){

		if(!empty($category_id)&&!empty($state_id)){

						$query_base = "
						SELECT enterprices.id as id,
						enterprices.name_enterprice as name,
						enterprices.basic_description as description,
						enterprices.latitude_enterprice as latitude,
						enterprices.longitude_enterprice as longitude,
						enterprices.telephone_enterprice as telephone,
						codigo.estado as estado,
						codigo.municipio as municipio,
						enterprices.slug as slug ";

            if($category_id == 'all' && $state_id == 'all'){

            	$query2 = $query_base."FROM enterprices,codigo, categories
							WHERE enterprices.codigo_id = codigo.id
							AND enterprices.category = categories.id";

            }elseif($category_id == 'all' && $state_id != 'all'){
            	;
            	if(!empty($municipality_id)){

	                $query2 = $query_base."FROM enterprices,codigo
									WHERE enterprices.codigo_id = codigo.id
									AND codigo.idMunicipio = $municipality_id
									AND codigo.idEstado = $state_id";

	              }else{

	              	$query2 = $query_base."FROM enterprices,codigo
									WHERE enterprices.codigo_id = codigo.id
									AND codigo.idEstado = $state_id";

	              }

            }elseif($category_id != 'all' && $state_id == 'all'){

            	$query2 = $query_base."FROM enterprices,codigo,categories
							WHERE enterprices.codigo_id = codigo.id
							AND enterprices.category = categories.id
							AND enterprices.category = $category_id";

						}else{

            	if(!empty($municipality_id)){

                $query2 = $query_base."FROM enterprices,codigo, categories
								WHERE enterprices.codigo_id = codigo.id
								AND enterprices.category = categories.id
								AND categories.id = $category_id
								AND codigo.idMunicipio = $municipality_id
								AND codigo.idEstado = $state_id";

							}else{
                 $query2 = $query_base."FROM enterprices,codigo, categories
								 WHERE enterprices.codigo_id = codigo.id
								 AND enterprices.category = categories.id
								 AND categories.id = $category_id
								 AND codigo.idEstado = $state_id";
              }
            }

      }

      $query = $this->db->query($query2);

      return $query->result();

	}

	public function where_complete($id_enterprices,$criterio,$category_id){

		$query_b = "select * from enterprices where id in ('$id_enterprices')";

		if($category_id == 'all'){
			$query_b = "select * from enterprices where ((id in ('$id_enterprices')) AND (name_enterprice LIKE '%$criterio%' OR basic_description LIKE '%$criterio%') )";
		}
		if($category_id != 'all'){
			$query_b = "select * from enterprices where ((id in ('$id_enterprices')) AND (name_enterprice LIKE '%$criterio%' OR basic_description LIKE '%$criterio%') AND (category = $category_id) )";
		}

    $query = $this->db->query($query_b);
    return $query->result();
	}

	public function search($idMunicipio, $category){
    $query_b = "SELECT * FROM enterprices,codigo, categories WHERE enterprices.codigo_id = codigo.id AND enterprices.category = categories.id AND categories.id = '$category' AND codigo.idMunicipio = '$idMunicipio'";
    $query = $this->db->query($query_b);
    return $query->result();
  }


}
