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
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'valid_email' => 'Email tidak sah atau tidak valid!',
            'required' => 'Email wajib di isi!'
        ]);
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required|trim', [
            'required' => 'Kata Sandi wajib di isi!'
        ]);

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
        $this->form_validation->set_rules('nama', 'Name', 'required|trim', [
            'required' => 'Full Name atau Nama Lengkap wajib di isi!'
        ]);
        $this->form_validation->set_rules('username', 'UserName', 'required|trim', [
            'required' => 'Username wajib di isi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah terdaftar!',
            'valid_email' => 'Email tidak sah atau tidak valid!',
            'required' => 'Email wajib di isi!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]', [
            'matches' => 'Kata Sandi tidak cocok!',
            'min_length' => 'Kata Sandi terlalu pendek! Minimal 6 karakter!',
            'required' => 'Kata Sandi wajib di isi!'
        ]);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password1]', [
            'required' => 'Kata Sandi wajib di isi!',
            'matches' => 'Kata Sandi tidak cocok!'
        ]);

        if ($this->form_validation->run() == false) {
            // $this->load->library('form_validation');
            $data['title'] = 'Lost & Found Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            // echo "Data berhasil ditambahkan";
            $email = $this->input->post('email', true);
            $data = [
                'id_user' => uniqid(),
                'id_level' => 1,
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'is_active' => 0
            ];

            //token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda telah dibuat. Silakan aktifkan akun anda melalui Email</div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
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

        $this->email->from('lostandfoundalazhar@gmail.com', 'Lost And Found Universitas Al Azhar Indonesia (UAI)');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Klik link ini untuk memverifikasi akun anda : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifkan</a>');
        } elseif ($type == 'forgot') {
            $this->email->subject('Atur Ulang Kata Sandi');
            $this->email->message('Klik link ini untuk mengatur ulang kata sandi anda : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Atur Ulang Kata Sandi</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' telah diaktifkan! Silahkan login!</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal! Token kedaluwarsa atau expired!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal! Token salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal! Email salah!</div>');
            redirect('auth');
        }
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email wajib di isi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Lost & Found Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = htmlspecialchars($this->input->post('email'));

            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);

                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silakan Periksa Email Anda untuk Mengatur Ulang Kata Sandi Anda!</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar atau Belum Diaktifkan!</div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->session->set_userdata('reset_email', $email);

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->changePassword();
                } else {
                    // $this->db->delete('user',['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Atur Ulang Kata Sandi gagal! Token kedaluwarsa atau expired!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Atur Ulang Kata Sandi gagal! Token salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Atur Ulang Kata Sandi gagal! Email salah!</div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]', [
            'matches' => 'Kata Sandi tidak cocok!',
            'min_length' => 'Kata Sandi terlalu pendek! Minimal 6 karakter!',
            'required' => 'Kata Sandi wajib di isi!'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[6]|matches[password1]', [
            'matches' => 'Kata Sandi tidak cocok!',
            'min_length' => 'Kata Sandi terlalu pendek! Minimal 6 karakter!',
            'required' => 'Kata Sandi wajib di isi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Lost & Found Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kata Sandi Telah Diubah! Silahkan Login!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_level');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah keluar atau logged out!</div>');
        redirect('auth');
    }
}
