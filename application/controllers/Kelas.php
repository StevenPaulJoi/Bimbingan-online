<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
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
            'title'     => 'Kelas',
            'prodi'     => $this->db->get('prodi')->result_object(),
            'kelas'     => $this->db->join('prodi', 'prodi_id', 'left')->get('kelas')->result_object()
        ];

        template_staff('staff/kelas/index', $data);
    }

    public function add()
    {
        $data = [
            'title'     => 'Tambah Kelas',
            'prodi'     => $this->db->get('prodi')->result_object(),
        ];

        $this->form_validation->set_rules('prodi_id', 'Prodi', 'required');
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
        if ($this->form_validation->run() == false) {
            template_staff('staff/kelas/add', $data);
        } else {
            $nama_kelas = $this->input->post('nama_kelas');
            $prodi_id = $this->input->post('prodi_id');
    
            $data = array(
                'nama_kelas' => $nama_kelas,
                'prodi_id' => $prodi_id,
            );
            $this->db->insert('kelas', $data);

            setToast('Kelas Berhasil Ditambahkan', 'success');
            redirect('kelas');
        }
    }

    public function edit($id)
    {
        $where = array('kelas_id' => $id);

        $data = [
            'title' => "Edit Kelas",
            'prodi' => $this->db->get('prodi')->result_object(),
            'kelas' => $this->db->get_where('kelas', $where)->row_object()
        ];

        $this->form_validation->set_rules('prodi_id', 'Prodi', 'required');
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
        if ($this->form_validation->run() == false) {
            template_staff('staff/kelas/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $this->db->update('kelas', $input, $where);
            
            setToast('Data berhasil diedit', 'success');
            redirect('kelas');
        }
    }

    public function delete($id)
    {
        $where = array('kelas_id' => $id);
        $this->db->delete('kelas', $where);

        setToast('Data Kelas Dihapus', 'success');
        redirect('kelas');
    }
}
