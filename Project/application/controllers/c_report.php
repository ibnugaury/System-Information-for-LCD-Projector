<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Report extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this->load->model('m_query');
	$this->load->library('pdf_report');
}
	public function index()
	{
		$data = $this->m_query->dataMahasiswa();
		$this->load->view('v_report' , ['data'=>$data]);
	}

}
