<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class User
 */
class Enterprice extends MY_Controller
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
        //Get all users
        if($this->Admin_model->isAdmin($this->user->id)){
          $enterprices = $this->Enterprice_model->all();
        }else{
          $enterprices = $this->Enterprice_model->where_user($this->user->id);
        }


        $this->bladeView('system.form.base_find',[
            'data'          => $enterprices,
            'type'          => "Empresa",
            'model'         => "Enterprice",
            'text_section'  => 'Vista de Empresa',
            'columns'       => ['Id'              => 'id',
                                'Nombre'          => 'name_enterprice',
                                'Dirección'       => 'address_enterprice',
                                'Correo de la empresa'        => 'email_enterprice',
            ],

        ]);
    }


    public function create(){

        $categories = $this->Category_model->all();

        $mySchedule = [
          'Domingo' => [
            'start' => '9:00am',
            'end'   => '6:00pm'
          ],
          'Lunes' => [
            'start' => '9:00am',
            'end'   => '6:00pm'
          ],
          'Martes' => [
            'start' => '9:00am',
            'end'   => '6:00pm'
          ],
          'Miercoles' => [
            'start' => '9:00am',
            'end'   => '6:00pm'
          ],
          'Jueves' => [
            'start' => '9:00am',
            'end'   => '6:00pm'
          ],
          'Viernes' => [
            'start' => '9:00am',
            'end'   => '6:00pm'
          ],
          'Sábado' => [
              'start' => '9:00am',
              'end'   => '6:00pm'
          ]
            ];

        $objDays = json_decode(json_encode($mySchedule));

        $this->bladeView('system.enterprice.create',[
          'model' => 'Enterprice',
          'categories' => $categories,
          'days' => $objDays
        ]);

    }

    public function register(){

        $schedule = $this->input->post('schedule');

        $mySchedule = [
          'Domingo' => [
            'start' => $schedule[0],
            'end'   => $schedule[1]
          ],
          'Lunes' => [
            'start' => $schedule[2],
            'end'   => $schedule[3]
          ],
          'Martes' => [
            'start' => $schedule[4],
            'end'   => $schedule[5]
          ],
          'Míercoles' => [
            'start' => $schedule[6],
            'end'   => $schedule[7]
          ],
          'Jueves' => [
            'start' => $schedule[8],
            'end'   => $schedule[9]
          ],
          'Viernes' => [
            'start' => $schedule[10],
            'end'   => $schedule[11]
          ],
          'Sábado' => [
              'start' => $schedule[12],
              'end'   => $schedule[13]
          ]
        ];

        $objDays =json_encode($mySchedule);


        $new_services = $this->input->post('name_service');

        $slug_generator = $this->slugGenerator($this->input->post('name_enterprice'));

        $new_enterprice = array(
            'name_enterprice' => $this->input->post('name_enterprice'),
            'slug' => $slug_generator,
            'address_enterprice' => $this->input->post('address_enterprice'),
            'latitude_enterprice' => $this->input->post('latitude_enterprice'),
            'longitude_enterprice' => $this->input->post('longitude_enterprice'),
            'basic_description' => $this->input->post('basic_description'),
            'large_description' => $this->input->post('large_description'),
            'email_enterprice' => $this->input->post('email_enterprice'),
            'telephone_enterprice' => $this->input->post('telephone_enterprice'),
            'social_networks' => $this->input->post('social_networks'),
            'youtube_presentation' => $this->input->post('youtube_presentation'),
            'schedule' =>  $objDays ,
            'payments_types' => $this->input->post('payments_types'),
            'category' => $this->input->post('category'),
            'User_idUser' => $this->session->user->id,
            'codigo_id' => $this->input->post('codigo_id'),
        );

        $this->db->insert('enterprices', $new_enterprice);

        $id = $this->db->insert_id(); //last enterprice

        foreach ($new_services as $service) {
          $this->db->insert('services', ['name_service' => $service,'Enterprice_idEnterprice' => $id]);
        }

        $enterprice = $this->Enterprice_model->get($id);

        //$this->bladeView('system.enterprice.modify',['enterprice' => $enterprice, 'msg' => "Exito"]);
        redirect('/index.php/Enterprice/modify/'.$id);
    }





    public function update(){

        $new_services = $this->input->post('name_service');

        $slug_generator = $this->slugGenerator($this->input->post('name_enterprice'));

        $schedule = $this->input->post('schedule');

        $mySchedule = [
          'Domingo' => [
            'start' => $schedule[0],
            'end'   => $schedule[1]
          ],
          'Lunes' => [
            'start' => $schedule[2],
            'end'   => $schedule[3]
          ],
          'Martes' => [
            'start' => $schedule[4],
            'end'   => $schedule[5]
          ],
          'Míercoles' => [
            'start' => $schedule[6],
            'end'   => $schedule[7]
          ],
          'Jueves' => [
            'start' => $schedule[8],
            'end'   => $schedule[9]
          ],
          'Viernes' => [
            'start' => $schedule[10],
            'end'   => $schedule[11]
          ],
          'Sábado' => [
              'start' => $schedule[12],
              'end'   => $schedule[13]
          ]
        ];

        $objDays =json_encode($mySchedule);

        $modify_enterprice = array(
            'name_enterprice' => $this->input->post('name_enterprice'),
            'slug' => $slug_generator,
            'address_enterprice' => $this->input->post('address_enterprice'),
            'latitude_enterprice' => $this->input->post('latitude_enterprice'),
            'longitude_enterprice' => $this->input->post('longitude_enterprice'),
            'basic_description' => $this->input->post('basic_description'),
            'large_description' => $this->input->post('large_description'),
            'email_enterprice' => $this->input->post('email_enterprice'),
            'telephone_enterprice' => $this->input->post('telephone_enterprice'),
            'social_networks' => $this->input->post('social_networks'),
            'youtube_presentation' => $this->input->post('youtube_presentation'),
            'schedule' => $objDays,
            'payments_types' => $this->input->post('payments_types'),
            'category' => $this->input->post('category'),
            'User_idUser' => $this->session->user->id,
            'codigo_id' => $this->input->post('codigo_id'),
        );

        $this->db->update('enterprices', $modify_enterprice ,  array('id' =>  $this->input->post('id')));

        $enterprice = $this->Enterprice_model->get( $this->input->post('id'));

        foreach ($new_services as $service) {
          $this->db->insert('services', ['name_service' => $service,'Enterprice_idEnterprice' => $this->input->post('id')]);
        }

        //var_dump($proyect);
        //$this->bladeView('system.enterprice.modify',['enterprice' => $enterprice, 'msg' => "Exito"]);
        redirect('/index.php/Enterprice/modify/'.$enterprice->id);
    }




    public function modify($id){
        if($this->Enterprice_model->isOfUser($id,$this->session->user->id)) //Validate Enterprice and User
        {
            $proyects = $this->Proyect_model->ofEnterprice($id);
            $services = $this->Service_model->ofEnterprice($id);
            $categories = $this->Category_model->all();
            $enterprice = $this->Enterprice_model->get($id);
            $files = $this->File_model->forEnterprice($enterprice->id);
            $zipcode = $this->Zip_model->cp($enterprice->codigo_id);
            $colonies = $this->Zip_model->find_zip_code($zipcode[0]->cp);
            $days = json_decode($enterprice->schedule);

            $this->bladeView('system.enterprice.modify',
            [
              'enterprice' => $enterprice,
              'model'      => "Enterprice",
              'files'      => $files,
              'categories' => $categories,
              'services'   => $services,
              'proyects'   => $proyects,
              'colonies' => $colonies,
              'zipcode' => $zipcode,
              'days' => $days
          ]);
          return TRUE;
        }
        redirect('/index.php/Enterprice/');
    }

    public function zip_code(){
      $zip_code = $this->input->get('zip');
      $data = $this->Zip_model->find_zip_code($zip_code);
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
    }

    public function delete(){
        $id = $this->input->post('id');
        $proyects = $this->Proyect_model->ofEnterprice($id);

        $this->output->set_content_type('application/json');

        //image and register of the proyects
        foreach ($proyects as $proyect) {
          $images = $this->File_model->imagesOfProyect($proyect->id);
          if(!empty($images)){
            foreach ($images as $image) {
             $this->db->delete('files', array('id' => $image->id));
            }
          }
          $this->db->delete('proyects', array('id' => $proyect->id));
        }
        //end registers of the proyect

        //images of the enterprice
        $images = $this->File_model->imagesOfEnterprice($id);
        if(!empty($images)){
          foreach ($images as $image) {
         $this->db->delete('files', array('id' => $image->id));
        }
        }
        //End image of the enterprice


        //Delete enterprice of the bd
        $result = $this->db->delete('enterprices', array('id' => $id));

        $this->output->set_output(json_encode(array('response' => $result)));
        if($result==true){
          $this->output->set_output(json_encode(array('response' => 'ok')));
        }
  }

//Upload Image
  public function upload(){

      $id = $this->input->post('id');
      $path = './uploads/img/enterprices/';

      $config['upload_path']= $path;
      $config['allowed_types']= '*';
      $config['max_size']= 20048;
      $config['max_width']= 20024;
      $config['max_height']= 20008;
      $new_name = time().$_FILES["file"]['name'];
      $config['file_name'] = $new_name;
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);

      $enterprice = $this->Enterprice_model->get($id);

      if(count($enterprice) >= 1 && ($this->upload->do_upload('file'))){
        //upload

          $data = array('upload_data' => $this->upload->data());
          $name = $data['upload_data']['raw_name'];
          $extension = $data['upload_data']['file_ext'];
          $type = $data['upload_data']['image_type'];

          $new_photo = array(
            'name_file' => $name.$extension,
            'type_file' => $type,
            'Enterprice_idEnterprice' => $enterprice->id,

          );

          $this->db->insert('files', $new_photo);

          return true;


      }else{

        $error = array('error' => $this->upload->display_errors());
        return false;

      }

  }

  public function slugText($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }


    public function slugGenerator($name){
        $slug = $this->slugText($name);
        $base = $slug;
        $i = 0;
        do{
            if($i == 0){
                $count = $this->Enterprice_model->haveSlug($slug);
            }else{
                $new_slug = $this->slugText($slug." ".$i);
                $count = $this->Enterprice_model->haveSlug($new_slug);
                $slug = $this->slugText($base." ".$i);
            }
            $i++;
        }while(count($count) != 0);

        return $slug;
    }


  public function detele_img(){

    $id_name = $this->input->post('id_name');
    $file = $this->File_model->get($id_name);
    if($file){
      $path = './uploads/img/enterprices/';
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
