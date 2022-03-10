<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Review extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->form_validation->set_error_delimiters('<div class="text-danger small">', '</div>');
    }

    public function index()
    {
        return "Access Denied!";
    }

    public function show($id)
    {
        is_mhs();
        $where = ['bimbingan_id' => $id,];
        $bimbingan = $this->db->join('pengajuan', 'pengajuan_id', 'left')->get_where('bimbingan', $where)->row();
        $where['pengajuan_id'] = $bimbingan->pengajuan_id;

        $data = [
            'title' => "Review Bimbingan",
            'bimbingan' => $bimbingan,
            'review' => $this->bimbingan->getReviewer($where),
        ];

        template_mhs('mahasiswa/bimbingan/review', $data);
    }

    public function bimbingan($id)
    {
        is_staff();
        $where = ['bimbingan_id' => $id];
        $data = [
            'title' => "Review Bimbingan",
            'bimbingan' => $this->db->join('pengajuan', 'pengajuan_id', 'left')->get_where('bimbingan', $where)->row(),
            'review' => $this->db->get_where('review', $where)->result(),
        ];

        $this->form_validation->set_rules('catatan', 'Catatan', 'required');
        if ($this->form_validation->run() == false) {
            template_staff('staff/bimbingan/review', $data);
        } else {
            $input = [
                'bimbingan_id' => $id,
                'staff_id' => staffdata('staff_id'),
                'status_review' => $this->input->post('status_review', true),
                'catatan' => $this->input->post('catatan', true),
                'catatan_2' => $this->input->post('catatan_2', true),
                'tgl_review' => date('Y-m-d H:i:s'),
            ];

            $this->db->insert('review', $input);

            setToast('Data berhasil disimpan', 'success');
            return redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function delete($id)
    {
        is_staff();
        $this->db->delete('review', [
            'review_id' => $id
        ]);
        
        setToast('data berhasil dihapus', 'success');
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
