<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class User
 */
class Proyect extends MY_Controller
{

   private $user;

    public function __construct()
    {
        parent::__construct();

        $logged = $this->session->userdata('logged');
        $user_logged = $this->session->userdata('user');

        if (!isset($logged)){
            redirect('/index.php/login');
        }

        if($user_logged->status_user == 0){
            $this->bladeView('pages.active_count');
            return;
        }

        $this->user = $this->session->user;

    }


    public function index()
    {
        //Get all Proyect
        $proyects = $this->Proyect_model->where_user($this->user->id);
        $this->bladeView('system.form.base_find',[
            'data'          => $proyects,
            'type'          => "Proyecto",
            'model'         => "Proyect",
            'text_section'  => 'Vista de Proyecto',
            'columns'       => ['Id'              => 'id',
                                'Titulo'          => 'title',
                                'Lugar de trabajo'=> 'place_of_proyect',
                                'Duración'        => 'time_of_proyect',
            ],


        ]);
    }

    public function create(){

        $id_enterprice = $this->input->get('id_enterprice');
        $this->bladeView('system.proyect.create',['id_enterprice' => $id_enterprice]);

    }

    public function register(){

        $new_proyect = array(
            'title' => $this->input->post('title'),
            'header' => $this->input->post('header'),
            'place_of_proyect' => $this->input->post('place_of_proyect'),
            'time_of_proyect' => $this->input->post('time_of_proyect'),
            'method_of_payment' => $this->input->post('method_of_payment'),
            'description' => $this->input->post('description'),
            'Enterprice_idEnterprice' => $this->input->post('id_enterprice'),
            'User_idUser' => $this->session->user->id
        );

        $this->db->insert('proyects', $new_proyect);

        //$this->bladeView('system.proyect.create',['msg' => "Exito"]);

        $id = $this->db->insert_id(); //last enterprice

        redirect('/index.php/Proyect/modify/'.$id);


    }


    public function update(){

        $new_user = array(
            'title' => $this->input->post('title'),
            'header' => $this->input->post('header'),
            'place_of_proyect' => $this->input->post('place_of_proyect'),
            'time_of_proyect' => $this->input->post('time_of_proyect'),
            'method_of_payment' => $this->input->post('method_of_payment'),
            'description' => $this->input->post('description'),
            'User_idUser' => $this->session->user->id
        );
        $this->db->update('proyects', $new_user,  array('id' =>  $this->input->post('id')));

        $proyect = $this->Proyect_model->get( $this->input->post('id'));
        //var_dump($proyect);
        //$this->bladeView('system.proyect.modify',['proyect' => $proyect, 'msg' => "Exito"]);

        redirect('/index.php/Proyect/modify/'.$proyect->id);


    }

    public function modify($id){
        if($this->Proyect_model->isOfUser($id,$this->session->user->id)){ //Validate Proyect and User
            $proyect = $this->Proyect_model->get($id);
            $files = $this->File_model->forProyect($proyect->id);
            $this->bladeView('system.proyect.modify',[
              'proyect' => $proyect,
              'files' => $files,
            ]);
            return TRUE;
        }
        redirect('/index.php/Proyect/');
    }


    public function delete(){
        $id = $this->input->post('id');
        $this->output->set_content_type('application/json');
        $images = $this->File_model->imagesOfProyect($id);
        foreach ($images as $image){
         $this->db->delete('files', array('id' => $image->id));
        }
        $result = $this->db->delete('proyects', array('id' => $id));
        $this->output->set_output(json_encode(array('response' => 'fail')));
        if($result==true){
          $this->output->set_output(json_encode(array('response' => 'ok')));
        }
      }



      //Upload Image
        public function upload(){

            $id = $this->input->post('id');
            $path = './uploads/img/proyects/';

            $config['upload_path']= $path;
            $config['allowed_types']= '*';
            $config['max_size']= 20048;
            $config['max_width']= 20024;
            $config['max_height']= 20008;
            $new_name = time().$_FILES["file"]['name'];
            $config['file_name'] = $new_name;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            $proyect = $this->Proyect_model->get($id);
            if(count($proyect) >= 1 && $this->upload->do_upload('file')){
              //upload


                $data = array('upload_data' => $this->upload->data());
                $name = $data['upload_data']['raw_name'];
                $extension = $data['upload_data']['file_ext'];
                $type = $data['upload_data']['image_type'];

                $new_photo = array(
                  'name_file' => $name.$extension,
                  'type_file' => $type,
                  'Proyect_idProyect' => $proyect->id,

                );

                $this->db->insert('files', $new_photo);

                return true;


            }else{
              $error = array('error' => $this->upload->display_errors());
              return false;

            }
            echo "Aqui 4";

        }


        public function detele_img(){

          $id_name = $this->input->post('id_name');
          $file = $this->File_model->get($id_name);
          if($file){
            $path = './uploads/img/proyects/';
            $file_delete = $path.$file->name_file;
            echo $file_delete;
            if (is_readable($file_delete) && unlink($file_delete)) {
                echo "The file has been deleted";
                $this->db->where('id', $file->id);
                $this->db->delete('files');
            } else {
                echo "The file was not found or not readable and could not be deleted";
            }
          }

        }
}
