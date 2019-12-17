<?php 

class Pengambilan_model extends CI_Model
{

	public $table = 'pengambilan';

	function __construct()
	{
		parent::__construct();
	}


	function input_data()
	{
		$data = [
			"no_laporan" => $this->input->post('no_laporan', true),
			"nama_pengambil" => $this->input->post('nama_pengambil', true),
			"no_hp" => $this->input->post('no_hp', true),
			"foto_pengambil" => $this->input->post('foto_pengambil', true),
			"tgl_pengambilan" => $this->input->post('tgl_pengambilan', true)
		];
		
		$this->db->insert($this->table, $data);
	}
}
