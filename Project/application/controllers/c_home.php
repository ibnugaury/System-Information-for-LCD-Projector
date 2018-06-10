<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Home extends CI_Controller {


     public function __construct()
	{
		parent::__construct();
		$this->load->model('m_query');
		$this->load->library('form_validation');
		$this->load->helper('url', 'html');
    }

    public function index() {
        $data = $this->m_query->dataMahasiswa();
		$this->load->view('v_home', ['data'=>$data]);	
    }

   public function insertMahasiswa()
	{
		$this->form_validation->set_rules('nim', 'nim' , 'required');
		$this->form_validation->set_rules('nama', 'nama' , 'required');
		$this->form_validation->set_rules('lcd', 'lcd' , 'required');
        $this->form_validation->set_rules('ruangan', 'ruangan' , 'required');
        $this->form_validation->set_rules('matakuliah', 'matakuliah' , 'required');
        $this->form_validation->set_rules('status', 'status' , 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
        if ($this->form_validation->run() ) 
		{
            $nim = $this->input->post('nim');
			$nama = $this->input->post('nama');
			$lcd = $this->input->post('lcd');
            $ruangan = $this->input->post('ruangan');
            $matakuliah = $this->input->post('matakuliah');
            $status = $this->input->post('status');

            $mahasiswa = (['nim'=>$nim,
							'nama'=>$nama,
                            'lcd'=>$lcd,
                            'ruangan'=>$ruangan,
                            'matakuliah'=>$matakuliah,
                            'status'=>$status]);
            
            $data = array_merge($mahasiswa);
             if ($this->m_query->TambahMahasiswa($data) == false) {
					$this->session->set_flashdata('pesan', 'Data Anda Sudah tersimpan di database');
					redirect('c_home', 'refresh');
				}

            else
				{
					$this->index();
                }
            }    
    
        else {
	        $this->index();
		 }

}

public function EditMahasiswa($id) {
   $data = $this->m_query->AmbilDataMahasiswa($id);
   $this->load->view('v_editmahasiswa', ['data'=>$data]);}

 public function UpdateMahasiswa() {
     $this->form_validation->set_rules('nim', 'nim' , 'required');
		$this->form_validation->set_rules('nama', 'nama' , 'required');
		$this->form_validation->set_rules('lcd', 'lcd' , 'required');
        $this->form_validation->set_rules('ruangan', 'ruangan' , 'required');
        $this->form_validation->set_rules('matakuliah', 'matakuliah' , 'required');
        $this->form_validation->set_rules('status', 'status' , 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
        if ($this->form_validation->run() ) 
		{
            $nim = $this->input->post('nim');
			$nama = $this->input->post('nama');
			$lcd = $this->input->post('lcd');
            $ruangan = $this->input->post('ruangan');
            $matakuliah = $this->input->post('matakuliah');
            $status = $this->input->post('status');

            $mahasiswa = (['nim'=>$nim,
							'nama'=>$nama,
                            'lcd'=>$lcd,
                            'ruangan'=>$ruangan,
                            'matakuliah'=>$matakuliah,
                            'status'=>$status]);
            
            $data = array_merge($mahasiswa);
             if ($this->m_query->M_EditMahasiswa($data, $this->input->post('id')) == false)  
             {
					$this->session->set_flashdata('edit_mahasiswa', 'Data Anda Sudah Diedit');
					redirect('c_home', 'refresh');
				}

            else
				{
					$this->index();
                }
            }    
    
        else {
	        $this->index();
		 }


 }  

    public function DeleteMahasiswa($id)
	{
		if ($this->m_query->M_DeleteMahasiswa($id) == false) 
			{
				$this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus');
			}
			redirect('c_home','refresh');
    }

    public function DeleteAllMahasiswa()
	{
		if ($this->m_query->M_DeleteAllMahasiswa() == false) 
			{
				$this->session->set_flashdata('pesan', 'Semua Data Berhasil Di Hapus');
			}
			redirect('c_home','refresh');
    }
    

}