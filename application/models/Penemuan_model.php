<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penemuan_model extends CI_Model
{

    public $table = 'temuan';

    public function __construct()
    {
        parent::__construct();
    }


    public function getAllPenemuan()
    {
        return $this->db->get('temuan')->result_array();
    }

    public function input_data($data)
    {
        $this->db->insert($this->table, $data);
    }
}
