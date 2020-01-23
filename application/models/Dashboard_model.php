<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // $dblokal  = $this->load->database("default", TRUE);
        // $query = $dblokal->query("SELECT COUNT(id_temuan)
        // 						 FROM temuan
        // 			");
        // return $query->result();

        $this->db = $this->load->database('default', TRUE);

        $sql = "SELECT COUNT(id_temuan)
        FROM temuan";

        $query = $this->db->query($sql);

        if ($query) {
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row) {
                    $items = $row;
                }
                $data = $items;
            }
        }

        return $data;
    }
}
