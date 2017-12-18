<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recovery extends MY_Controller
{

  public function __construct()
  {
      parent::__construct();
      $this->load->library('Validation');
      $this->load->library('Mailers');
  }

  public function index(){

    $email = $this->input->post('email');

    $user = $this->User_model->findMail($email);

    if (count($user) >= 1) {

        $user = $user[0];

        $hoy = time();

        $new_password = md5($user->first_name.$user->email_user.$hoy);

        $this->mailers->passwordMail($user,$new_password);

        $user_modify['password'] = password_hash( $new_password, PASSWORD_DEFAULT);

        $this->db->update('users', $user_modify, array('id' => $user->id));

        //send view

        $this->session->set_flashdata('register', 'correct');

        redirect('/index.php/Recovery/pass_register');
    }

    $this->bladeView('pages.recovery',['error_msg' => 'El correo ingresado no esta en nuestra base']);
    return false;

  }

  public function pass_register(){
    if($this->session->register){
      $this->bladeView('pages.pass_success');
    }else{
      $this->bladeView('pages.home');
    }
  }


}
