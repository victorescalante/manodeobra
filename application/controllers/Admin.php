<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Welcome
 */
class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $logged = $this->session->userdata('logged');
        $user_logged = $this->session->userdata('user');

        if (!isset($logged)){
            redirect('/index.php/login');
        }

        if($user_logged->status_user == 0){
            var_dump($user_logged);
            $this->bladeView('pages.active_count');
            return;
        }



    }

    public function index()
    {
        $this->bladeView('system.index');
    }

}
