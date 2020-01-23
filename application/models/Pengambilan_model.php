<?php

class Pengambilan_model extends CI_Model
{

	public $table = 'pengambilan';

	function __construct()
	{
		parent::__construct();
	}


	function getAllPengambilan()
	{
		return $this->db->get('pengambilan')->result_array();
	}

	function input_data($data)
	{
		$this->db->insert('pengambilan', $data);
		$id = $data['no_laporan'];

		$this->db->set('status', 1);
		$this->db->where('no_laporan', $id);
		$this->db->update('temuan');
	}
}
