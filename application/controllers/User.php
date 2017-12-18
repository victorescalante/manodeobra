<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class User
 */
class User extends MY_Controller

{

  public $user;


    public function __construct()
    {
        parent::__construct();
        $this->load->library('Validation');
        $this->load->library('Mailers');
        $this->load->helper(array('form', 'url'));
        $this->session->userdata('user');
    }


    public function index()
    {
        //Obtain all Users
        $users = $this->User_model->all_msg();
        $this->bladeView('system.form.base_find',[
          'data' => $users,
          'type' => "Usuario",
          'model' => "User",
          'text_section' => 'Vista de Usuario',
          'columns' => ['Id' => 'id',
                        'Nombre' => 'first_name',
                        'Correo' => 'email_user',
                        'Cuenta' => 'user_active',
                        'link de verificación' => 'status_link'
                        ],


        ]);
    }

    public function create(){

        $this->bladeView('pages.register');

    }

    public function register()
      {

        $new_user = array(
        'username' => $this->input->post('username'),
        'password' => password_hash( $this->input->post('password'), PASSWORD_DEFAULT), //Encrypt Password,
        'first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name'),
        'type_user' => 1,
        'email_user' => $this->input->post('email_user'),
        'telephone_user' => $this->input->post('telephone_user'),
        'sex_user' => $this->input->post('sex_user'),
        'address_user' => $this->input->post('address_user'),
        'zipcode_user' => $this->input->post('zipcode_user'),
      );
      $result = $this->validation->validationUser();

      if($result === TRUE){
        $this->db->insert('users', $new_user);
        $id = $this->db->insert_id(); //last users
        $user = $this->User_model->get($id);
        $this->confirmIdentity($user);
        $this->session->set_flashdata('register', 'correct');
        redirect('/index.php/User/success_register');
      }

      $this->bladeView('pages.register',['errors' => $result]);


      }

      public function success_register(){
        if($this->session->register){
          $this->bladeView('pages.register_success');
        }else{
          $this->bladeView('pages.register');
        }
      }


      public function confirmIdentity($user){
        $this->mailers->verifyMail($user);
        return true;
      }

      public function confirm_mail($id){
        if(isset($id)){
          $user = $this->User_model->get($id);
          if($user->link_active == 1 && $user->status_user == 0){

            $validate_user = array(
                'link_active' => 0,
                'status_user' => 1,
            );

            $this->db->update('users', $validate_user,  array('id' => $user->id));

            $user = $this->User_model->get($id);

            $this->session->set_userdata(array('logged' => TRUE, 'user' => $user));

            redirect('/index.php/admin');

          }

        }

        redirect('/index.php/login');

      }




      //Upload Image
      public function upload(){

          $id = $this->input->post('id');
          $path = './uploads/img/avatars/';

          $config['upload_path']= $path;
          $config['allowed_types']= 'gif|jpg|png';
          $config['max_size']= 2048;
          $config['max_width']= 2024;
          $config['max_height']= 2008;
          $new_name = time().$_FILES["file"]['name'];
          $config['file_name'] = $new_name;
          $config['encrypt_name'] = TRUE;

          $this->load->library('upload', $config);

          $user = $this->User_model->get($id);

          if(count($user) >= 1 && ($this->upload->do_upload('file'))){
            //upload
            if($user->avatar){
              $file_delete = $path.$user->avatar;
              if (is_readable($file_delete) && unlink($file_delete)) {
                  echo "The file has been deleted";
              } else {
                  echo "The file was not found or not readable and could not be deleted";
              }

            }
              $data = array('upload_data' => $this->upload->data());
              $name = $data['upload_data']['raw_name'];
              $extension = $data['upload_data']['file_ext'];

              $new_photo = array(
                'avatar' => $name.$extension,
              );

              $this->db->update('users', $new_photo,  array('id' =>  $id));


              return true;


          }else{

            $error = array('error' => $this->upload->display_errors());
            return false;

          }

      }




    public function modify($id){
      $user = $this->User_model->get($id);
      $this->bladeView('system.user.modify',['user' => $user,'model' => 'User']);
    }


    public function update(){

        $id = $this->input->post('id');

        $new_user = array(
            'username' => $this->input->post('username'),
            'password' => password_hash( $this->input->post('password'), PASSWORD_DEFAULT), //Encrypt Password,
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email_user' => $this->input->post('email_user'),
            'telephone_user' => $this->input->post('telephone_user'),
            'sex_user' => $this->input->post('sex_user'),
            'address_user' => $this->input->post('address_user'),
            'zipcode_user' => $this->input->post('zipcode_user'),
        );

        $result = $this->validation->validationModifyUser();
        $user = $this->User_model->get($id);

        if($result === TRUE){

          $this->db->update('users', $new_user,  array('id' =>  $id));
          $user = $this->User_model->get($id);
          $this->bladeView('system.user.modify',['user' => $user, 'msg' => "Exito"]);
          return TRUE;
        }

        // aqui estoy malvar_dump($this->user);

        $this->bladeView('system.user.modify',['user' => $user,'errors' => $result]);
        return TRUE;
    }


    public function delete(){

        $this->output->set_content_type('application/json');
        $result = $this->db->delete('users', array('id' => $this->input->post('id')));
        $this->output->set_output(json_encode(array('response' => 'fail')));
        if($result==true){
          $this->output->set_output(json_encode(array('response' => 'ok')));
        }



    }


    public function zip_code(){
      $zip_code = $this->input->get('zip');
      $data = $this->Zip_model->find_zip_code($zip_code);
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));

    }


    public function image($image){

        $config['upload_path']= './uploads/';
        $config['allowed_types']= 'gif|jpg|png';
        $config['max_size']= 2048;
        $config['max_width']= 2024;
        $config['max_height']= 2008;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($image))
        {
              $data = $this->upload->display_errors();
              return false;

        } else {
             $file_info = $this->upload->data();
             var_dump($file_info);
             return true;
        }

     }




}
