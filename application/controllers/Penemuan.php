<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penemuan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penemuan_model');
        $this->load->library('form_validation');
        $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }


    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['temuan'] = $this->Penemuan_model->getAllPenemuan();
        $data['title'] = 'Lost & Found - Penemuan';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penemuan/index');
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/auth_footer');
    }

    public function add()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Lost & Found - Tambah Barang Temuan';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penemuan/formpenemuan');
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/auth_footer');
    }

    public function add_action()
    {
        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            // $no_laporan = ;
            // $id_barang = ;
            // $id_user = ;
            // // $tgl_temuan = $this->input->post('tgl_temuan');
            // $lokasi_penemuan = 
            // $nama_barang = 
            // $deskripsi = 
            // // $foto_barang = $this->input->post('foto_barang');

            $data = array(
                'no_laporan' => $this->input->post('no_laporan'),
                'id_barang' => $this->input->post('id_barang'),
                'id_user' => $this->input->post('id_user'),
                'tgl_temuan' => time(),
                'lokasi_penemuan' => $this->input->post('lokasi_penemuan'),
                'nama_barang' => $this->input->post('nama_barang'),
                'deskripsi' => $this->input->post('deskripsi'),
                'foto_barang' => 'default.jpg'
            );

            $this->Penemuan_model->input_data($data);
            redirect(site_url('penemuan'));
        }
    }
}
