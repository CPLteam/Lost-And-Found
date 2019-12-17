<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Pengambilan_model extends CI_Model
{

	public $table = 'pengambilan';

	function __construct()
	{
		parent::__construct();
	}


	function input_data($data)
	{
		$this->db->insert($this->table, $data);
	}
}
