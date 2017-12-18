<?php
defined("BASEPATH") or die("El acceso al script no está permitido");

class Validation {

  protected $CI;

  // We'll use a constructor, as you can't directly call a function
  // from a property definition.
  public function __construct()
  {
    // Assign the CodeIgniter super-object
    $this->CI =& get_instance();
    $this->CI->load->library('form_validation');
  }


  //User Validate
  //New User
  public function validationUser()
  {

    $validation_user = new CI_Form_validation();


    $validation_user->set_rules('first_name', 'Nombre', 'required');
    $validation_user->set_rules('last_name', 'Apellido', 'required');
    $validation_user->set_rules('email_user', 'Correo', 'required|valid_email|is_unique[users.email_user]');
    $validation_user->set_rules('password', 'Contraseña', 'required');
    $validation_user->set_rules('confirm_password', 'Confirmar Contraseña', 'required|matches[password]');

     if($validation_user->run()==FALSE){
       return $validation_user->error_array();
     }

     return TRUE;

  }


  public function validationModifyUser()
  {

    $validation_user = new CI_Form_validation();

    $validation_user->set_rules('first_name', 'Nombre', 'required');
    $validation_user->set_rules('last_name', 'Apellido', 'required');
    $validation_user->set_rules('email_user', 'Correo', 'required|valid_email');
    $validation_user->set_rules('password', 'Contraseña', 'required');
    $validation_user->set_rules('confirm_password', 'Confirmar Contraseña', 'required|matches[password]');


    if($validation_user->run()==FALSE){
      return $validation_user->error_array();
    }

    return TRUE;

  }



}
