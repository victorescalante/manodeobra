<?php

/**
 *
 */
class Pending_model extends MY_Model
{

  public function sections($id_enterprice){
		$query = $this->db->get_where('detail_enterprice_section', array('Enterprice_idEnterprice' => $id_enterprice));
    return $query->result();
	}

}
