<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penemuan_model extends CI_Model
{

    public $table = 'temuan';
    public $id = 'no_laporan';

    function __construct()
    {
        parent::__construct();
    }

    function getAllPenemuan()
    {
        $this->db->select("temuan.*, user.username as username, barang.jenis_barang as jenis_barang, detail_barang.nama_barang as nama_barang,lokasi.lantai as lantai,lokasi.gedung as gedung");
        $this->db->join("user", "user.id_user = temuan.id_user", "left");
        $this->db->join("barang", "barang.id_barang = temuan.id_barang", "left");
        $this->db->join("detail_barang", "detail_barang.id_detail_barang = temuan.id_detail_barang", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = temuan.id_lokasi", "left");
        return $this->db->get('temuan')->result_array();
    }

    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_jenisBarang()
    {
        $hasil = $this->db->query("SELECT * FROM barang");
        return $hasil;
    }

    function get_namaBarang($id_barang)
    {
        $hasil = $this->db->query("SELECT * FROM detail_barang WHERE `id_barang` = '$id_barang' ");
        return $hasil->result();
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

    function update($id, $status)
    {
        $this->db->set('status', $status);
        $this->db->where($this->id, $id);
        $this->db->update('temuan', $status);
    }
}
