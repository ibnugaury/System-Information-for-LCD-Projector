<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Sim extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->helper('url', 'html');
        $this->load->library('form_validation');
        $this->load->model('m_query');
    }    
        public function index()
	{   
        $this->load->view('v_sim');
    }
    
    public function user_login() 
    {
        $this->form_validation->set_rules('username', 'Username' , 'required');
        $this->form_validation->set_rules('password', 'Password' , 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

        if ($this->form_validation->run() ) 
		{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->m_query->login($username, $password);
        }

        else
		{
			$this->index();
		}
    }

    public function home() {
        $this->load->view('v_home');
    }

    public function keluar()
    {
        $this->session->sess_destroy();
        redirect('c_sim', 'refresh');
    }
}
