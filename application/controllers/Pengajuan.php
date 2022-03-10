<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->form_validation->set_error_delimiters('<div class="text-danger small">', '</div>');
    }

    public function index()
    {
        is_mhs();
        $where = [
            'mhs_id'    =>  mhsdata('mhs_id')
        ];

        $data = [
            'title' => "Pengajuan Judul TA/PKMI",
            'pengajuan' => $this->pengajuan->get_where($where)
        ];
        
        template_mhs('mahasiswa/pengajuan/index', $data);
    }

    public function add()
    {
        is_mhs();

        $data = [
            'title' => "Pengajuan Judul TA/PKMI"
        ];

        $this->form_validation->set_rules('jenis_pengajuan', 'Jenis Pengajuan', 'required|trim');
        $this->form_validation->set_rules('judul_pengajuan', 'Judul Pengajuan', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        if ($this->form_validation->run() == false) {
            template_mhs('mahasiswa/pengajuan/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $input['mhs_id'] = mhsdata('mhs_id');
            
            $this->db->insert('pengajuan', $input);
            
            setToast('Pengajuan anda sedang diproses', 'success');
            redirect('/pengajuan');
        }
    }

    // Kaprodi

    public function data()
    {
        is_staff();
        $data = [
            'title' => "Pengajuan Judul TA/PKMI",
            'pengajuan' => $this->pengajuan->get()
        ];
        
        template_staff('staff/pengajuan/index', $data);
    }

    public function delete($id)
    {
        $where = array('pengajuan_id' => $id);
        $this->db->delete('pengajuan', $where);

        setToast('Data Pengajuan Dihapus', 'success');
        redirect('pengajuan/data');
    }
}
