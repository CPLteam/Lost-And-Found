<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class No_urut extends CI_Model
{

    function buat_no_laporan()
    {
        $this->db->select('RIGHT(temuan.id_temuan, 4) as kode', FALSE);
        $this->db->order_by('id_temuan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('temuan');

        if ($query->num_rows() <> 0) {
            //jika kode nya sudah ada
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada
            $kode = 1;
        }
        $hariini = date('Ymd');
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "$hariini" . $kodemax;
        return $kodejadi;
    }



    //Prototype kode figure
    // function buat_kode_figure($value='')
    // {
    // 	# code...
    // }
}
