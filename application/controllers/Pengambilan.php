<?php 
 
 
class Pengambilan extends CI_Controller{
 
	function __construct(){
        	parent::__construct();
			$this->load->model('pengambilan_model');
			$this->load->library('form_validation');
	}

	public function index()
	{
		#template tampilan web
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Lost & Found -  Formulir Pengambilan';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pengambilan/index');

		#hubungan dengan data
		$data['content_id'] = 'pengambilan/index.php';
		if ($this->input->post('btnKirim')==TRUE) {
			$attr = array(
						'id_ambil' =>set_value(uniqid()),
						'no_laporan' =>set_value($this->input->post('no_laporan', true)) ,
						'nama_pengambil' =>set_value($this->input->post('nama_pengambil', true)),
						'no_hp' =>set_value($this->input->post('no_hp', true)),
						'foto_pengambil'=>set_value($this->input->post('foto_pengambil', true)),
						'tgl_pengambilan'=>set_value($this->input->post('tgl_pengambilan', true))
					);
			$this->pengambilan_model->input_data($attr);
		}


		//$this->pengambilan_model->input_data($attr);
		//$this->form_validation->set_rules('no_laporan', 'no_laporan', 'required');
        //$this->form_validation->set_rules('nama_pengambil', 'nama_pengambil', 'required');
        //$this->form_validation->set_rules('no_hp', 'no_hp', 'required');
        //$this->form_validation->set_rules('foto_pengambil', 'foto_pengambil', 'required');
        //$this->form_validation->set_rules('tgl_pengambilan', 'tgl_pengambilan', 'required');
        
        //if ($this->form_validation->run() ==FALSE) {
          //  $data['content_id'] = 'pengambilan/index.php';
          //  } else {
			//$this->pengambilan_model->input_data();
			//redirect(home);
        //}
	}
}
