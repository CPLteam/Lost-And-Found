<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengambilan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengambilan_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Lost & Found - Pengambilan';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pengambilan/index');
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/auth_footer');
	}

	public function add_action()
	{
		// $no_laporan = $this->input->post('no_laporan');
		// $nama_pengambil = $this->input->post('nama_pengambil');
		// $no_hp = $this->input->post('no_hp');
		// $foto_pengambilan = $this->input->post('foto_pengambilan');
		// $tgl_pengambilan = $this->input->post('Tgl_ambil');



		$data = array(
			'id_ambil' => uniqid(),
			'no_laporan' => $this->input->post('no_laporan', true),
			'nama_pengambil' => $this->input->post('nama_pengambil', true),
			'no_hp' => $this->input->post('no_hp', true),
			// 'foto_pengambilan' => 'default.jpg',
			'Tgl_ambil' => time()
		);

		// $this->db->insert('pengambilan', $data);
		$this->Pengambilan_model->input_data($data);
		redirect('pengambilan/index');
	}
}
