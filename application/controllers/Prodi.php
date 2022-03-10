<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
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
            'title' => "Program Studi"
        ];
        $data['prodi'] = $this->db->get('prodi')->result_object();

        template_staff('staff/prodi/index', $data);
    }

    public function add()
    {
        $data = [
            'title'     => 'Tambah Kelas',
        ];

        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required');
        if ($this->form_validation->run() == false) {
            template_staff('staff/prodi/add', $data);
        } else {
            $nama_prodi = $this->input->post('nama_prodi');

            $data = array(
                'nama_prodi' => $nama_prodi,
            );
        
            $this->db->insert('prodi', $data);

            setToast('Program Studi Selesai Ditambahkan', 'success');
            redirect('prodi');
        }
    }

    public function delete($id)
    {
        $where = array('prodi_id' => $id);
        $this->db->delete('prodi', $where);
        setToast('Data Program Studi Dihapus', 'success');
        redirect('prodi');
    }

    public function edit($id)
    {
        $where = array('prodi_id' => $id);

        $data = [
            'title' => "Edit Program Studi",
            'prodi' => $this->db->get_where('prodi', $where)->row_object()
        ];

        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required');
        if ($this->form_validation->run() == false) {
            template_staff('staff/prodi/edit', $data);
        } else {
            $input = $this->input->post(null, true);

            $this->db->update('prodi', $input, $where);
            
            setToast('Data Program Studi Telah Berhasil Diedit', 'success');
            redirect('prodi');
        }
    }
}
