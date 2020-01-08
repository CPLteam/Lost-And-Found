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

 	/*function get_laporan()
	{
		$results = $this->db->select('no_laporan, nama_barang')->get('temuan')->result_array();

		$laporan = array();
		foreach($results as $result){
			$laporan[$result['no_laporan']] = $result['nama_barang'];
		}
		$laporan[''] = 'Pilih No Laporan'
		return $laporan;
	}*/
}
