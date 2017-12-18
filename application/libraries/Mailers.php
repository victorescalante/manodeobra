<?php
defined("BASEPATH") or die("El acceso al script no está permitido");

class Mailers {

  protected $CI;
  public $mail_custom;

  // We'll use a constructor, as you can't directly call a function
  // from a property definition.
  public function __construct()
  {
    // Assign the CodeIgniter super-object
    $this->CI =& get_instance();
    $this->CI->load->library('email');

    $config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.mx',
			'smtp_port' => 587,
			'smtp_user' => 'user@manosdeobra.com',
			'smtp_pass' => 'pass',
			'mailtype' => 'html',
			'charset' => 'utf-8'
		);

    $this->mail_custom = new CI_Email();
    $this->mail_custom->initialize($config);
    $this->mail_custom->set_newline("\r\n");
  }

  public function verifyMail($user){

    $this->mail_custom->from('user@manosdeobra.com', 'Manos de obra');
    $this->mail_custom->to($user->email_user);
    //$this->mail_custom->cc('other_user@gmail.com');
    $this->mail_custom->subject($user->first_name.' Verifica tu cuenta');
    $this->mail_custom->message('<h3>Verificación de cuenta</h3><p>Estas a un solo paso de verificar tu cuenta da clic en el siguiente enlace: <a href="'.base_url('index.php/User/confirm_mail').'/'.$user->id.'">Clic Aqui</a></p>');
    $this->mail_custom->send();

  }

  public function passwordMail($user,$new_password){

    $this->mail_custom->from('user@manosdeobra.com', 'Manos de obra');
    $this->mail_custom->to($user->email_user);
    //$this->mail_custom->cc('other_user@gmail.com');
    $this->mail_custom->subject($user->first_name.' Nueva Contraseña');
    $this->mail_custom->message('
    <h3>Verificación de cuenta</h3>
    <p>Hola '.$user->first_name.' pediste la recuperación de tu cuenta hace un momento, para acceder a tu cuenta.</p>
    <br>
    <p> Tu contraseña temporal es '.$new_password.'</p>');
    $this->mail_custom->send();

  }



}
