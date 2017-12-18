<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Comment
 */
class Comment extends MY_Controller
{


    public function index()
    {
        //Obtain all Users
        $this->dataView['example'] = 'Example dataview string';
        $this->bladeView('system.index', $this->dataView);
    }

    public function create_comment(){


      $new_comment = array(
      'comment' => $this->input->post('comment'),
      'User_idUser' => 1,
      'Proyect_idProyect' => $this->input->post('Proyect_id_idProyec'),
      'comment_status' => $this->input->post('Enterprice_idEnterpricer')
    );

    return $this->db->insert('comments', $new_comment);

  }

  public function userloggin(){
      //add code for obtain the user loggin
  }


}
