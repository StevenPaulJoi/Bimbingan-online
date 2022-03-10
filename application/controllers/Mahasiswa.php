<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_staff();
        $this->form_validation->set_error_delimiters('<div class="text-danger small">', '</div>');
    }

    public function index()
    {
        $data = [
            'title' => "Mahasiswa",
            'mahasiswa' => $this->db->order_by('mhs_id', 'DESC')->get('mahasiswa')->result()
        ];

        template_staff('staff/mahasiswa/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Mahasiswa',
            'prodi' => $this->db->get('prodi')->result()
        ];

        $this->form_validation->set_rules('npm', 'NPM', 'required');
        $this->form_validation->set_rules('nama_mahasiswa', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('prodi_id', 'Prodi', 'required');


        if ($this->form_validation->run() == false) {
            template_staff('staff/mahasiswa/add', $data);
        } else {
            $npm = $this->input->post('npm');
            $nama_mahasiswa = $this->input->post('nama_mahasiswa');
            $prodi_id = $this->input->post('prodi_id');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $data = array(
                'npm' => $npm,
                'nama_mahasiswa' => $nama_mahasiswa,
                'password' => $password,
                'prodi_id' => $prodi_id,
            );

            $this->db->insert('mahasiswa', $data);
            
            setToast('Mahasiswa Selesai Ditambahkan', 'success');
            redirect('mahasiswa');
        }
    }

    public function edit($id)
    {
        $where = array('mhs_id' => $id);
        $data = [
            'title' => "Update Data Mahasiswa",
            'mahasiswa' => $this->db->get_where('mahasiswa', $where)->row_object(),
            'prodi' => $this->db->get('prodi')->result(),
        ];

        $this->form_validation->set_rules('npm', 'NPM', 'required');
        $this->form_validation->set_rules('nama_mahasiswa', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('prodi_id', 'Prodi', 'required');

        if ($this->form_validation->run() == false) {
            template_staff('staff/mahasiswa/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            if ($input['password']) {
                $input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
            } else {
                unset($input['password']);
            }

            $this->db->update('mahasiswa', $input, $where);
            setToast('Data Mahasiswa berhasil diedit', 'success');
            redirect('mahasiswa');
        }
    }

    public function delete($id)
    {
        $where = array('mhs_id' => $id);
        $this->db->delete('mahasiswa', $where);

        setToast('Data Mahasiswa Dihapus', 'success');
        redirect('mahasiswa');
    }
}
