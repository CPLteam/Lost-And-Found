<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('No_urut');
        $this->load->model('Dashboard_model');
    }

    public function index()
    {
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Lost & Found - Dashboard';
        $data['total'] = $this->Dashboard_model->index();

        // var_dump($data['total']);
        // die;

        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/logout', $data);
        $this->load->view('templates/auth_footer');
    }
}
