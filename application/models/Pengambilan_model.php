<?php

class Pengambilan_model extends CI_Model
{

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
	}
}
