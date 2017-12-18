<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Welcome
 */
class Pages extends MY_Controller
{
    public function index()
    {
        $categories = $this->Category_model->all();
        $states = $this->Zip_model->states();
        //$municipalities = $this->Zip_model->municipalities();
        $this->bladeView('pages.home',[
          'categories' => $categories,
          'states'     => $states
          //'municipalities' => $municipalities
        ]);
    }

    public function municipalities_for_state(){
      $state_id = $this->input->get('idEstado');
      $data = $this->Zip_model->municipalities($state_id);
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
    }


    public function enterprices()
    {
      $state_id = $this->input->get('state_id');
      $category_id = $this->input->get('category_id');
      $municipality_id = $this->input->get('municipality_id');
      $enterprices_find = $this->Enterprice_model->all();
      $states = $this->Zip_model->states();
      $categories = $this->Category_model->all();
      $per_page = $this->input->get('per_page');


      $enterprices = $this->Enterprice_model->where_conditions($category_id,$state_id,$municipality_id);


      if(isset($enterprices) && count($enterprices) != 0){


        foreach ($enterprices as $enterprice) {
          $query2 = $this->db->query("select * from files where Enterprice_idEnterprice = ".$enterprice->id." Limit 1");

          if(count($query2->result()) == 0){
            $images[] = 'vacio';
          }

          foreach($query2->result() as $row)
                {

                  if(isset($row->name_file)){

                    $images[] = $row->name_file;

                  }



                }
          }


          $this->load->library('pagination');

          $config['base_url'] = base_url().'index.php/Pages/enterprices';
          $config['total_rows'] = count($enterprices);
          $config['per_page'] = 10;
          $config['reuse_query_string'] = TRUE;
          $config['page_query_string'] = TRUE;
          $config['first_url'] = $config['base_url'].'index.php/Pages/enterprices';

          $this->pagination->initialize($config);


        $this->bladeView('pages.enterprices',[
          'categories' => $categories,
          'enterprices' => $enterprices,
          'images' => $images,
          'states'     => $states,
          'paginator' => $this->pagination
        ]);

        return false;

      }
      //Enviar vista cuando no haya resultado

        $this->bladeView('pages.not_found');
        return false;

    }

    public function detail($slug)
    {
      $query = $this->Enterprice_model->ofSlug($slug);
      $id = $query[0]->id;
      $proyects = $this->Proyect_model->ofEnterprice($id);
      $services = $this->Service_model->ofEnterprice($id);
      $enterprice = $this->Enterprice_model->get($id);
      $category = $this->Category_model->get($enterprice->category);
      $images = $this->File_model->imagesActiveOfEnterprice($id);
      $images_proyects = array();
      $days = json_decode($enterprice->schedule);

      if(!empty($proyects)){
        foreach ($proyects as $proyect) {
          $files = $this->File_model->imagesActiveOfProyect($proyect->id);
          if(!empty($files)){
            $value = $files;
          }else{
            $value = "vacio";
          }
          array_push($images_proyects,$value);
        }
        //console.log($images_proyects);
      }

      $this->bladeView('pages.detail',
      [
        'enterprice' => $enterprice,
        'images' => $images,
        'category' => $category,
        'services' => $services,
        'proyects' => $proyects,
        'images_proyects' => $images_proyects,
        'days' => $days
      ]);
    }

    public function login()
    {
      $this->bladeView('pages.login');
    }

    public function recovery()
    {
      $this->bladeView('pages.recovery');
    }

    public function tienda()
    {
      $this->bladeView('pages.tienda');
    }



}
