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

        $data = array(
                    'no_laporan' =>set_value('no_laporan') ,
                    'nama_pengambil' =>set_value('nama_pengambil'),
                    'no_hp' =>set_value('no_hp'),
                    'foto_pengambil'=>set_value('foto_pengambil'),
                    'tgl_pengambilan'=>set_value('tgl_pengambilan'));

		$this->form_validation->set_rules('no_laporan', 'no_laporan', 'required');
        $this->form_validation->set_rules('nama_pengambil', 'nama_pengambil', 'required');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
        $this->form_validation->set_rules('foto_pengambil', 'foto_pengambil', 'required');
        $this->form_validation->set_rules('tgl_pengambilan', 'tgl_pengambilan', 'required');
        
        if ($this->form_validation->run() ==FALSE) {
            $data['content_id'] = 'pengambilan/index.php';
            } else {
			$this->pengambilan_model->input_data();
			redirect(home);
        }
	}
}
