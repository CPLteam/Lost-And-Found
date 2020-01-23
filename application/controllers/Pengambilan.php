<?php


class Pengambilan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('penemuan_model');
		$this->load->model('pengambilan_model');
		$this->load->model('No_urut');
		$this->load->library('form_validation');

		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
	}

	public function index()
	{
		#template tampilan web
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Lost & Found -  Data Pengambilan';
		$data['pengambilan'] = $this->pengambilan_model->getAllPengambilan();
		$data['temuan'] = $this->Penemuan_model->getAllPenemuan();
		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pengambilan/index');
		// $this->load->view('penemuan/formpengambilan');
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/logout', $data);
		$this->load->view('templates/auth_footer');
	}



	public function add($id = null)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Lost & Found - Formulir Pengambilan';
		$data['temuan'] = $this->Penemuan_model->getAllPenemuan();
		$data['idnolaporan'] = $this->Penemuan_model->getBynolaporantemuan($id);

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pengambilan/index');
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/logout', $data);
		$this->load->view('templates/auth_footer');
	}

	public function add_action()
	{
		$this->add();

		$foto_pengambil = $_FILES['foto_pengambil'];
		if ($foto_pengambil == '') {
		} else {
			$config['upload_path'] = './assets/img';
			$config['allowed_types'] = 'jpg|png';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('foto_pengambil')) {
				echo "Upload Gagal";
				die();
			} else {
				$foto_pengambil = $this->upload->data('file_name');
			}
		}

		$data = array(
			'id_ambil' => $this->input->post('id_ambil', true),
			'no_laporan' => $this->input->post('no_laporan', true),
			'nama_pengambil' => $this->input->post('nama_pengambil', true),
			'no_hp' => $this->input->post('no_hp', true),
			'foto_pengambil' => $foto_pengambil,

		);

		$this->pengambilan_model->input_data($data);
		if ($this->pengambilan_model->input_data($data) == TRUE) {
			$sql = $this->db->get('temuan');
			$row = $sql->result();
			$row->status = 1;
			$this->db->update('temuan', $row);
		}
		redirect(site_url('pengambilan'));
	}
}
