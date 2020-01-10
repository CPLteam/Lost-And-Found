<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penemuan_model extends CI_Model
{

    public $table = 'temuan';

    function __construct()
    {
        parent::__construct();
    }

    function getAllPenemuan()
    {
        $this->db->select("temuan.*, detail_barang.nama_barang as nama_barang, barang.jenis_barang as jenis_barang,lokasi.lantai as lantai,lokasi.gedung as gedung,user.username as username");
        $this->db->join("detail_barang", "detail_barang.id_detail_barang = temuan.id_detail_barang", "left");
        $this->db->join("barang", "barang.id_barang = temuan.id_barang", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = temuan.id_lokasi", "left");
        $this->db->join("user", "user.id_user = temuan.id_user", "left");
        return $this->db->get('temuan')->result_array();
    }

    function fetch_barang()
    {
        $this->db->order_by('jenis_barang', 'ASC');
        $query = $this->db->get('barang');
        return $query->result();
    }

    function fetch_detail($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->order_by('nama_barang', 'ASC');
        $query = $this->db->get('detail_barang');
        $output = '<option value="">Pilih Nama Barang</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value "'.$row->id_detail_barang.'">'.$row->nama_barang.'</option>';
        }
        return $output;
    }

    function input_data($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function hapusDataPenemuan($no_laporan)
    {
        $this->db->where('no_laporan', $no_laporan);
        $this->db->delete('temuan');
    }

    // public function get_status()
    // {
    //     # code...
    // }
}
