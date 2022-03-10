<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembimbing extends CI_Controller
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

    public function add($id)
    {
        is_staff();

        if (!$id) {
            redirect('pengajuan/data');
        }

        $data = [
            'title' => "Proses Pengajuan TA/PKMI",
            'pengajuan' => $this->pengajuan->get($id),
            'staff' => $this->db->get_where('staff', ['role'=>'dosen'])->result(),
        ];

        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {
            template_staff('staff/pembimbing/add', $data);
        } else {
            $status = $this->input->post('status', true);
            $dataPengajuan = ['status' => $status];
            $where = ['pengajuan_id' => $id];

            if ($status == 'disetujui') {
                $dosen = $this->input->post('dosen', true);
                $asisten = $this->input->post('asisten', true);

                if (!$dosen || !$asisten) {
                    setToast('Pilih dosen & asisten pembimbing!', 'danger');
                    return redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $dataPembimbing = [
                        [
                            'pengajuan_id' => $id,
                            'staff_id' => $dosen,
                            'jabatan' => 'dosen_pembimbing',
                        ],
                        [
                            'pengajuan_id' => $id,
                            'staff_id' => $asisten,
                            'jabatan' => 'asisten_pembimbing',
                        ],
                    ];

                    $this->db->update('pengajuan', $dataPengajuan, $where);
                    $this->db->insert_batch('pembimbing', $dataPembimbing);

                    setToast('Data berhasil disimpan!', 'success');
                    redirect('/pengajuan/data');
                }
            } else {
                $this->db->update('pengajuan', $dataPengajuan, $where);

                setToast('Data berhasil disimpan!', 'success');
                redirect('/pengajuan/data');
            }
        }
    }
}
