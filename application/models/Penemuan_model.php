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

    function input_data($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function hapusDataPenemuan($no_laporan)
    {
        $this->db->where('no_laporan', $no_laporan);
        $this->db->delete('temuan');
    }

    public function cobaSave($no_laporan, $id_user, $tgl_temuan, $id_barang, $id_detail_barang, $deskripsi, $id_lokasi, $lokasi_penemuan, $foto_barang)
    {
        $hasil = $this->db->query("INSERT INTO temuan (no_laporan,id_user,tgl_temuan,id_barang,id_detail_barang,deskripsi,id_lokasi,lokasi_penemuan,foto_barang) VALUES ('$no_laporan','$id_user','$tgl_temuan','$id_barang','$id_detail_barang','$deskripsi','$id_lokasi','$lokasi_penemuan','$foto_barang')");
        return $hasil;
    }

    // public function get_status()
    // {
    //     # code...
    // }
}
