<?php

class User_model extends MY_Model
{
	//public $primary_key = 'id';


	public function all(){
		$query = $this->db->get('users');
		return $query->result();
	}

	public function all_msg(){
		$query = $this->db->query("select *, if(status_user = 1,'Activo','Desactivado' ) as 'user_active', if(link_active = 1,'Activo','Desactivado' ) as 'status_link' from users");
		return $query->result();
	}


	public function findMail($email){
		$this->db->where('email_user',$email);
		$query = $this->db->get('users');
		return $query->result();
	}

	public function Altagalef($username,$password,$first_name,$last_name,$type_user,$email_user,$telephone_user,$sex_user,$address_user,$zipcode_user,$avatar)
			{
				var_dump($avatar);
			$consulta=$this->db->query("insert into users (username,pass,first_name,last_name,type_user,email_user,telephone_user,sex_user,address_user,zipcode_user,avatar)values('$username','$password','$first_name','$last_name','$type_user','$email_user','$telephone_user','$sex_user','$address_user','$zipcode_user','$avatar')");
			}


}
