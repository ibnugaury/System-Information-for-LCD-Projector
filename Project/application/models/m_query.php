<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_query extends CI_Model {
    var $table = "users";

    public function __construct()
	{
		parent::__construct();
		$this->load->database();
    }
    
    public function login($username, $password) 
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(['username'=>$username, 'password'=>md5($password)]);
        $return = $this->db->get('');

        if ($return->num_rows() > 0) 
		{
           foreach ($return->result() as $row) 
			{
                if($row->level=="admin")
                {
                    $session = array('level' =>'admin');
                    $this->session->set_userdata( $session );
                }
                redirect('c_home', 'refresh');
            }

        }

        else {
            $this->session->set_flashdata('pesan', 'Username dan Password salah');
            redirect('c_sim', 'refresh');
        }
        
    }

    public function TambahMahasiswa($data)
	{
		$this->db->insert('tb_mahasiswa',$data);
    }
    
    public function dataMahasiswa()
	{
		$this->db->select('*');
		$this->db->from('tb_mahasiswa');
		$this->db->order_by('id', 'asc');
		$data = $this->db->get('');
		return $data;
    }
    
    public function AmbilDataMahasiswa($id) 
    {
        $data = $this->db->where(['id'=>$id])
				 		 ->get("tb_mahasiswa");
		if ($data->num_rows() > 0) {
			return $data->row();
		}
}

    public function M_EditMahasiswa($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tb_mahasiswa', $data);
    }
    
    public function M_DeleteMahasiswa($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tb_mahasiswa');
    }
    
     public function M_DeleteAllMahasiswa()
	{
		$this->db->empty_table('tb_mahasiswa');
	}
}