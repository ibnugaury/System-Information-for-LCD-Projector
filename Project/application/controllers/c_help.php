<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Help extends CI_Controller {

     public function index()
	{   
        $this->load->view('v_help');
    }
}