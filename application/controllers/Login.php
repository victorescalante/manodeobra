<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
    private $logged;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model', 'user');

        $this->logged = $this->session->userdata('logged');

    }



    public function index()
    {
        if (isset($this->logged)){
            redirect('index.php/admin');
            return;
        }

        if($this->session->flashdata('error')){
            $this->bladeView('pages.login',['error_msg' => $this->session->flashdata('error')]);
            return;
        }
        $this->bladeView('pages.login');
        return;
    }

    public function checkToken(){
      $token = $this->input->get('token');

      $this->db->limit(1);

      $qryUser = $this->user->get_by(array('token' => $token,'token_active' => 1 ));

      if (!$qryUser)
      {
          $this->session->set_flashdata('error', 'Usuario o contraseña incorrectos');
          redirect('/index.php/login');
      }

      if($qryUser->status_user == 0){

        $this->session->set_flashdata('error', 'Tu cuenta esta inactiva');
        redirect('/index.php/login');
        return;
      }
      $data = array(
        'token' => '',
        'token_active' => 0
      );
      $this->db->update('users', $data,  array('id' =>  $qryUser->id));
      $this->session->set_userdata(array('logged' => TRUE, 'user' => $qryUser));

      redirect('/index.php/admin');
      return;



    }

    public function login()
    {

        if (!$this->input->post() || (!$this->input->post('email') && !$this->input->post('password') ))
        {
            $this->session->set_flashdata('error', 'Necesitas llenar los campos');
            redirect('/index.php/login');
        }

        $this->db->limit(1);

        $qryUser = $this->user->get_by(array('email_user' => $this->input->post('email') ));

        if (!$qryUser)
        {
            $this->session->set_flashdata('error', 'Usuario o contraseña incorrectos');
            redirect('/index.php/login');
        }

        $qryPass = password_verify($this->input->post('password'), $qryUser->password);


        if ($qryPass)
        {
            if($qryUser->status_user == 0){

              $this->session->set_flashdata('error', 'Tu cuenta esta inactiva');
              redirect('/index.php/login');
              return;
            }

            if($qryUser->type_user == 1000){
              $token = $this->generateToken($qryUser);
              redirect ('http://admin.manosdeobra.com/checkToken/'.$token);
            }

            $this->session->set_userdata(array('logged' => TRUE, 'user' => $qryUser));
            redirect('/index.php/admin');
            return;

        }

        $this->session->set_flashdata('error', 'Usuario o contraseña incorrectos');
        redirect('/index.php/login');
    }

    /**
     * Logout request
     */
    public function logout()
    {

        if ($this->session->userdata('logged'))
        {
            $this->session->sess_destroy();
        }

        redirect('/');
    }

    public function generateToken($user){

        $token = password_hash($user->first_name.$user->last_name,PASSWORD_DEFAULT);
        $delete = array('/','.','$','&');
        $token = str_replace($delete, "", $token);
        $data = array(
          'token' => $token,
          'token_active' => 1
        );
        $this->db->update('users', $data,  array('id' =>  $user->id));
        return $token;
    }

}
