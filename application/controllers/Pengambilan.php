<?php


class Pengambilan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('pengambilan_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		#template tampilan web
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Lost & Found -  Data Pengambilan';
		$data['pengambilan'] = $this->pengambilan_model->getAllPengambilan();
		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pengambilan/index');
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/auth_footer');
	}

	public function add()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Lost & Found - Formulir Pengambilan';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pengambilan/formpengambilan');
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/auth_footer');
	}

	public function add_action()
	{
		$this->add();

		$data = array(
			'id_ambil' => uniqid(),
			'no_laporan' => $this->input->post('no_laporan', true),
			'nama_pengambil' => $this->input->post('nama_pengambil', true),
			'no_hp' => $this->input->post('no_hp', true),
			'tgl_pengambilan' => time()
		);

		$this->pengambilan_model->input_data($data);
		redirect(site_url('pengambilan'));
 	}
}
