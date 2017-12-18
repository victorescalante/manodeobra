<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller 
{

	public $dataView = array();


	public function bladeView($page, $data = array(''))
	{
		echo $this->blade->view()->make($page, $data)->render();
	}

}
