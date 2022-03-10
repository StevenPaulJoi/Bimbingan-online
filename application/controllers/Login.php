<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->form_validation->set_error_delimiters('<div class="text-danger small">', '</div>');
    }

    public function index()
    {
        if ($this->session->has_userdata('sess_staff')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Sistem';
            template_auth('auth/login_staff', $data);
        } else {
            //validasinya success
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $staff = $this->db->get_where('staff', ['username' => $username])->row_array();
        //usernya ada
        if ($staff) {
            //jika usernya sudah aktif
            //cek password
            if (password_verify($password, $staff['password'])) {
                $this->session->set_userdata('sess_staff', $staff['staff_id']);
                redirect('dashboard');
            } else {
                setToast('Password salah!!', "danger");
                redirect('login');
            }
        } else {
            setToast('Username tidak terdaftar!!', "danger");
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('sess_staff');
        
        setToast("Anda berhasil logout.");
        redirect('login');
    }
}
