<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class User
 */
class Service extends MY_Controller
{


    public function index()
    {
        //Obtain all Users
        $services = $this->Service_model->all();
        $this->bladeView('system.form.base_find',[
            'data'          => $services,
            'type'          => "Servicio",
            'model'         => "Service",
            'text_section'  => 'Vista de Servicio',
            'columns'       => ['Id'              => 'id',
                                'Nombre'          => 'name_service',
                                'Costo Min'=> 'cost_service_min',
                                'Tiempo de Servicio'        => 'time_service',
            ],


        ]);
    }


    public function create(){

        $this->bladeView('system.service.create');

    }

    public function register(){

      $new_user = array(
      'name_service' => $this->input->post('name_service'),
      'cost_service_min' => $this->input->post('cost_service_min'),
      'cost_service_max' => $this->input->post('cost_service_max'),
      'time_service' => $this->input->post('time_service'),

    );

    $this->db->insert('services', $new_user);

    $this->bladeView('system.service.create',['msg' => "Exito"]);

  }



    public function update(){

      $new_user = array(
      'name_service' => $this->input->post('name_service'),
      'cost_service_min' => $this->input->post('cost_service_min'),
      'cost_service_max' => $this->input->post('cost_service_max'),
      'time_service' => $this->input->post('time_service'),

    );

    $this->db->update('services', $new_user,  array('id' =>  $this->input->post('id')));

    $service = $this->Service_model->get( $this->input->post('id'));
    //var_dump($proyect);
    $this->bladeView('system.service.modify',['service' => $service, 'msg' => "Exito"]);

    }

    public function modify($id){
      $service = $this->Service_model->get($id);
      //var_dump($service);
      $this->bladeView('system.service.modify',['service' => $service]);  }


    public function delete(){

        $this->output->set_content_type('application/json');
        $result = $this->db->delete('services', array('id' => $this->input->post('id')));
        $this->output->set_output(json_encode(array('response' => 'fail')));
        if($result==true){
          $this->output->set_output(json_encode(array('response' => 'ok')));
        }

      }


}
