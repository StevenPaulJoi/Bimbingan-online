<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autentifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->form_validation->set_error_delimiters('<div class="text-danger small">', '</div>');
    }

    public function index()
    {
        if ($this->session->has_userdata('sess_mhs')) {
            redirect('home');
        }

        $this->form_validation->set_rules('npm', 'Npm', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Mahasiswa';
            template_auth('auth/login_mhs', $data);
        } else {
            //validasinya success
            $this->_login();
        }
    }

    private function _login()
    {
        $npm = $this->input->post('npm');
        $password = $this->input->post('password');

        $mahasiswa = $this->db->get_where('mahasiswa', ['npm' => $npm])->row_array();
        //usernya ada
        if ($mahasiswa) {
            //jika usernya sudah aktif

            //cek password
            if (password_verify($password, $mahasiswa['password'])) {
                $this->session->set_userdata('sess_mhs', $mahasiswa['mhs_id']);
                redirect('home');
            } else {
                setToast('Password salah!!', "danger");
                redirect('autentifikasi');
            }
        } else {
            setToast('Username tidak terdaftar!!', "danger");
            redirect('autentifikasi');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('sess_mhs');
        
        setToast("Anda berhasil logout.");
        redirect('autentifikasi');
    }
}
