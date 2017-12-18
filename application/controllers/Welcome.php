<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Welcome
 */
class Welcome extends MY_Controller 
{
    public function index() 
    {
        $this->dataView['example'] = 'Example dataview string';
        $this->bladeView('welcome', $this->dataView);
    }

}