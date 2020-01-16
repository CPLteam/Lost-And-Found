<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penemuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penemuan_model');
        $this->load->model('No_urut');
        $this->load->library('form_validation');

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Lost & Found - Penemuan';
        $data['temuan'] = $this->Penemuan_model->getAllPenemuan();
        $data['barang'] = $this->Penemuan_model->fetch_barang();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penemuan/index2');
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/modal', $data);
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
        $this->add();
        // $now = date('Y-m-d');
        $tz = 'Asia/Jakarta';
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
        $dt->setTimestamp($timestamp); //adjust the object to correct timestamp
        $now = $dt->format('Y-m-d');

        $foto_barang = $_FILES['foto_barang'];
        if ($foto_barang == '') {
        } else {
            $config['upload_path'] = './assets/img';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto_barang')) {
                echo "Upload Gagal";
                die();
            } else {
                $foto_barang = $this->upload->data('file_name');
            }
        }

        $nama_file = uniqid() . $config['allowed_types'];
        $direktori = base_url('assets/img');
        $tempat = $direktori . $nama_file;
        $capture = file_put_contents($foto_barang, $tempat);

        // $no_laporan = ;
        // $id_barang = ;
        // $id_user = ;
        // // $tgl_temuan = $this->input->post('tgl_temuan');
        // $lokasi_penemuan = 
        // $nama_barang = 
        // $deskripsi = 
        // // $foto_barang = $this->input->post('foto_barang');

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data = array(
            'id_temuan' => $this->input->post('id_temuan'),
            'no_laporan' => $this->input->post('no_laporan'),
            'id_barang' => $this->input->post('id_barang'),
            'id_detail_barang' => $this->input->post('id_detail_barang'),
            'id_user' => $user['id_user'],
            'tgl_temuan' => $now,
            'id_lokasi' => $this->input->post('id_lokasi'),
            'lokasi_penemuan' => $this->input->post('lokasi_penemuan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'foto_barang' => $foto_barang,
            'status' => 0
        );

        $this->Penemuan_model->input_data($data);
        redirect(site_url('penemuan'));
    }

    public function fetch_detail()
    {
        if ($this->input->post('id_barang')) {
            echo $this->Penemuan_model->fetch_detail($this->input->post('id_barang'));
        }
    }

    public function hapus($no_laporan)
    {
        $this->Penemuan_model->hapusDataPenemuan($no_laporan);
        redirect('penemuan');
    }

    public function cobaSimpan()
    {
        $data = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $no_laporan = $this->input->post('no_laporan');
        $id_user = $data['id_user'];
        $tgl_temuan = $this->input->post('tgl_temuan');
        $id_barang = $this->input->post('id_barang');
        $id_detail_barang = $this->input->post('id_detail_barang');
        $deskripsi = $this->input->post('deskripsi');
        $id_lokasi = $this->input->post('id_lokasi');
        $lokasi_penemuan = $this->input->post('lokasi_penemuan');
        $foto_barang = $this->input->post('foto_barang');
        $this->Penemuan_model->cobaSave($no_laporan, $id_user, $tgl_temuan, $id_barang, $id_detail_barang, $deskripsi, $id_lokasi, $lokasi_penemuan, $foto_barang);
        redirect('penemuan');
    }
}
