<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Lost & Found';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $email = htmlspecialchars($this->input->post('email'));
            $password = htmlspecialchars($this->input->post('password'));

            $user = $this->db->get_where('user', ['email' => $email])->row_array();

            if ($user) {
                // usernya ada atau emailnya ada di database (terdaftar)
                if ($user['is_active'] == 1) {
                    // jika user ada dan aktif
                    if (password_verify($password, $user['password'])) {
                        // cek password jika sesuai
                        $data = [
                            'email' => $user['email'],
                            'id_level' => $user['id_level']
                        ];

                        $this->session->set_userdata($data);

                        if ($user['id_level'] == 1) {
                            // jika role idnya 1 maka masuk halaman admin
                            redirect('home');
                        } else {
                            // jika role idnya 0 maka masuk halaman user/member
                            redirect('user');
                        }
                    } else {
                        // cek password jika tidak sesuai atau salah
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata Sandi Salah!</div>');
                        redirect('auth');
                    }
                } else {
                    // jika user ada tapi tidak aktif
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Ini Belum Diaktifkan!</div>');
                    redirect('auth');
                }
            } else {
                // usernya ga ada atau emailnya null (ga ada di database/tidak terdaftar)
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar!</div>');
                redirect('auth');
            }
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('nama', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'UserName', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]', [
            'matches' => 'password dont match! ',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password1]');

        if ($this->form_validation->run() == false) {
            // $this->load->library('form_validation');
            $data['title'] = 'Lost & Found Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            // echo "Data berhasil ditambahkan";
            $data = [
                'id_user' => uniqid(),
                'id_level' => 1,
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'is_active' => 0
            ];

            //token
            $token = random_bytes(32);
            // var_dump($token);
            // die();

            $this->db->insert('user', $data);

            $this->_sendEmail();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations your account has been created. Please Login</div>');
            redirect('auth');
        }
    }

    private function _sendEmail()
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'lostandfoundalazhar@gmail.com',
            'smtp_pass' => 'cplteam2019',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('lostandfoundalazhar@gmail.com', 'Lost And Found Al Azhar (UAI)');
        $this->email->to('ichsan.prayoga21@gmail.com');
        $this->email->subject('Test Coba');
        $this->email->message('Hello World!');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_level');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been Logout</div>');
        redirect('auth');
    }
}
