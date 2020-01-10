<?php

class Home extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     // $this->load->model('Penemuan_model');
    //     $this->load->model('No_urut');
    //     $this->load->library('form_validation');
    // }

    public function index()
    {
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Lost & Found - Dashboard';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('home/index');
        $this->load->view('templates/footer', $data);
        // $this->load->view('templates/modal2');
        $this->load->view('templates/auth_footer');
    }
}
