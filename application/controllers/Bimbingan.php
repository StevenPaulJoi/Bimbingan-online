<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbingan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->form_validation->set_error_delimiters('<div class="text-danger small">', '</div>');
    }

    public function index()
    {
        is_mhs();

        $data = [
            'title' => "Bimbingan TA/PKMI",
            'pengajuan' => $this->pengajuan->getPembimbing([
                'mhs_id'    =>  mhsdata('mhs_id'),
                'status'    => 'disetujui',
            ])
        ];
        
        template_mhs('mahasiswa/bimbingan/index', $data);
    }

    public function jadwal_mhs($id)
    {
        is_mhs();

        $where = [
            'pengajuan_id' => $id,
            'mhs_id'    => mhsdata('mhs_id'),
        ];

        $data = [
            'title' => "Bimbingan TA/PKMI",
            'detail' => $this->pengajuan->getDetailPengajuan($id),
            'jadwal' => $this->bimbingan->getJadwalBySiswa($where),
            'bimbingan' => $this->db->order_by('bimbingan_id', 'desc')->get_where('bimbingan', ['pengajuan_id' => $id])->result(),
            'cekJadwal' => $this->bimbingan->cekJadwal($id),
            'upload_errors' => ''
        ];

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'pdf|doc|docx';
        $config['max_size']             = 10000;
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        if (isset($_FILES['file_laporan']['name'])) {
            if (!$this->upload->do_upload('file_laporan')) {
                $data['upload_errors'] = $this->upload->display_errors('<p class="text-danger small">', '</p>');
            } else {
                $data = $this->upload->data();
                $input = [
                    'pengajuan_id' => $id,
                    'file_laporan' => $data['file_name'],
                    'tgl_bimbingan' => date('Y-m-d H:i:s')
                ];

                $this->db->insert('bimbingan', $input);

                setToast('Laporan berhasil dikirim', "success");
                redirect('bimbingan/jadwal_mhs/'.$id);
            }
        }

        template_mhs('mahasiswa/bimbingan/jadwal', $data);
    }

    public function jadwal_mhs_s($id)
    {
        is_mhs();

        $where = [
            'pengajuan_id' => $id,
            'mhs_id'    => mhsdata('mhs_id'),
        ];

        $data = [
            'title' => "Bimbingan TA/PKMI",
            'detail' => $this->pengajuan->getDetailPengajuan($id),
            'jadwal' => $this->bimbingan->getJadwalBySiswa($where),
            'bimbingan' => $this->db->order_by('bimbingan_id', 'desc')->get_where('bimbingan', ['pengajuan_id' => $id])->result(),
            'cekJadwal' => $this->bimbingan->cekJadwal($id),
            'upload_errors' => ''
        ];

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'pdf|doc|docx';
        $config['max_size']             = 10000;
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        if (isset($_FILES['file_laporan']['name'])) {
            if (!$this->upload->do_upload('file_laporan')) {
                $data['upload_errors'] = $this->upload->display_errors('<p class="text-danger small">', '</p>');
            } else {
                $data = $this->upload->data();
                $input = [
                    'pengajuan_id' => $id,
                    'file_laporan' => $data['file_name'],
                    'tgl_bimbingan' => date('Y-m-d H:i:s')
                ];

                $this->db->insert('bimbingan', $input);

                setToast('Laporan berhasil dikirim', "success");
                redirect('bimbingan/jadwal_mhs/'.$id);
            }
        }

        template_mhs('mahasiswa/bimbingan/jadwal_s', $data);
    }

    // Staff

    public function data()
    {
        is_staff();

        $where = [
            'staff_id'  => staffdata('staff_id'),
            'status'    => 'disetujui',
        ];
        $data = $this->pengajuan->getBimbingan($where);

        $data = [
            'title' => "Bimbingan TA/PKMI",
            'pengajuan' => $data
        ];
        
        template_staff('staff/bimbingan/data', $data);
    }

    public function detail($id)
    {
        is_staff();

        $where = [
            'pengajuan_id' => $id
        ];

        $pengajuan = $this->pengajuan->get($id);

        $data = [
            'title' => "Bimbingan TA/PKMI",
            'pengajuan' => $pengajuan,
            'bimbingan' => $this->db->order_by('bimbingan_id', 'desc')->get_where('bimbingan', $where)->result()
        ];

        template_staff('staff/bimbingan/detail', $data);
    }

    public function update_status($bimbingan_id)
    {
        is_staff();

        $bimbingan = $this->bimbingan->get($bimbingan_id);

        $data = [
            'title' => "Update Status Bimbingan",
            'bimbingan' => $bimbingan
        ];

        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run()==false) {
            template_staff('staff/bimbingan/update_status', $data);
        } else {
            $input = $this->input->post(null, true);
            
            $this->db->update('bimbingan', $input, ['bimbingan_id'=>$bimbingan_id]);

            setToast('Data berhasil disimpan', "success");
            redirect('bimbingan/detail/'.$bimbingan->pengajuan_id);
        }
    }

    public function jadwal($id)
    {
        is_staff();

        $where = ['pengajuan_id' => $id];
        $detail = $this->pengajuan->get($id);
        
        if (!$detail) {
            redirect('bimbingan/data');
        }

        $data = [
            'title' => "Jadwal Bimbingan TA/PKMI",
            'detail' => $detail,
            'jadwal' => $this->db->get_where('jadwal_bimbingan', $where)->result(),
        ];
        
        template_staff('staff/bimbingan/list_jadwal', $data);
    }

    public function add_jadwal($id)
    {
        is_staff();

        $where = ['pengajuan_id' => $id];
        $detail = $this->pengajuan->get($id);
        
        if (!$detail) {
            redirect('bimbingan/data');
        }

        $data = [
            'title' => "Jadwal Bimbingan TA/PKMI",
            'detail' => $detail,
        ];
        
        $this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            template_staff('staff/bimbingan/add_jadwal', $data);
        } else {
            $input = $this->input->post(null, true);
            $input['pengajuan_id'] = $id;
            
            $this->db->insert('jadwal_bimbingan', $input);
            setToast('Jadwal berhasil ditambah', 'success');
            redirect('bimbingan/jadwal/'.$id);
        }
    }

    public function edit_jadwal($id)
    {
        is_staff();

        $where = ['jadwal_id' => $id];
        $detail = $this->db->get_where('jadwal_bimbingan', $where)->row_array();

        $data = [
            'title' => "Jadwal Bimbingan TA/PKMI",
            'detail' => $detail,
        ];
        
        $this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            template_staff('staff/bimbingan/edit_jadwal', $data);
        } else {
            $input = $this->input->post(null, true);
            
            $this->db->update('jadwal_bimbingan', $input, $where);
            setToast('Jadwal berhasil diedit', 'success');
            redirect('bimbingan/jadwal/'.$detail['pengajuan_id']);
        }
    }

    public function delete_jadwal($id)
    {
        $where = array('jadwal_id' => $id);
        $this->db->delete('jadwal_bimbingan', $where);
        setToast('Jadwal berhasil Dihapus', 'success');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function selesai($id)
    {
        $this->db->update('pengajuan', ['status' => 'selesai'], ['pengajuan_id' => $id]);
        
        setToast('Update status berhasil', "success");
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Admin Prodi

    public function buat_kartu_bimbingan()
    {
        if (staffdata()) {
            $where = [
                'status' => "selesai",
            ];
    
            $data = [
                'title' => "Kartu Bimbingan TA/PKMI",
                'pengajuan' => $this->pengajuan->get_where($where)
                
            ];
            
            template_staff('staff/kartu/data', $data);
        } else {
            $where = [
                'status' => "selesai",
                'mhs_id' => mhsdata('mhs_id'),
            ];
    
            $data = [
                'title' => "Kartu Bimbingan TA/PKMI",
                'pengajuan' => $this->pengajuan->get_where($where)
                
            ];
            
            template_mhs('mahasiswa/kartu/index', $data);
        }
    }

    public function cetak($id)
    {
        if (staffdata()) {
            $data = [
                'detail' => $this->pengajuan->getDetailPengajuan($id),
                'review' => $this->pengajuan->get_catatan($id),
                'jadi' => $this->pengajuan->get_jadwal($id),
                'jadwal' => $this->db->get_where('jadwal_bimbingan', [
                    'pengajuan_id' => $id
                ])->result()
            ];

            $this->load->view('staff/bimbingan/cetak_kartu', $data);
        } else {
            $where =  [
                'pengajuan_id' => $id,
                'mhs_id' => mhsdata('mhs_id')
            ];
            $data = [
                'detail' => $this->pengajuan->getDetailPengajuan($id),
                'review' => $this->pengajuan->get_catatan($id),
                'jadi' => $this->pengajuan->get_jadwal($id),
                'jadwal' => $this->db->join('pengajuan', 'pengajuan_id')->get_where('jadwal_bimbingan', $where)->result()
            ];

            $this->load->view('mahasiswa/kartu/cetak', $data);
        }
    }
}
