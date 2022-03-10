<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengajuanModel extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select("*");
        $this->db->join('mahasiswa m', 'mhs_id', 'left');

        if ($id) {
            return $this->db->get_where('pengajuan pg', ['pengajuan_id'=>$id])->row_array();
        }

        return $this->db->get('pengajuan pg')->result_array();
    }

    public function get_where($where)
    {
        $this->db->select("*");
        $this->db->join('mahasiswa m', 'mhs_id', 'left');

        return $this->db->get_where('pengajuan pg', $where)->result_array();
    }

    public function getBimbingan($where)
    {
        $this->db->join('pembimbing', 'pengajuan_id', 'left');
        $this->db->join('mahasiswa', 'mhs_id', 'left');
        return $this->db->get_where('pengajuan', $where)->result();
    }

    public function getPembimbing($where)
    {
        $this->db->select('*');
        $this->db->select('(SELECT display_name FROM pembimbing pb LEFT JOIN staff USING(staff_id) WHERE pg.pengajuan_id = pb.pengajuan_id AND pb.jabatan = "dosen_pembimbing") as dospem');
        $this->db->select('(SELECT display_name FROM pembimbing pb LEFT JOIN staff USING(staff_id) WHERE pg.pengajuan_id = pb.pengajuan_id AND pb.jabatan = "asisten_pembimbing") as aspem');
        return $this->db->get_where('pengajuan pg', $where)->result();
    }
    
    public function getDetailPengajuan($id)
    {
        $this->db->select('*');
        $this->db->select('(SELECT display_name FROM pembimbing pb LEFT JOIN staff USING(staff_id) WHERE pg.pengajuan_id = pb.pengajuan_id AND pb.jabatan = "dosen_pembimbing") as dospem');
        $this->db->select('(SELECT display_name FROM pembimbing pb LEFT JOIN staff USING(staff_id) WHERE pg.pengajuan_id = pb.pengajuan_id AND pb.jabatan = "asisten_pembimbing") as aspem');
        
        $this->db->join('mahasiswa m', 'mhs_id', 'left');
        $this->db->join('prodi', 'prodi_id', 'left');
        
        return $this->db->get_where('pengajuan pg', ['pengajuan_id'=>$id])->row_array();
    }

    public function get_catatan($id)
    {
        $this->db->join('staff', 'staff_id');
        $this->db->join('bimbingan', 'bimbingan_id');
        return $this->db->get_where('review', [
            'pengajuan_id' => $id
        ])->result();
    }

    public function get_jadwal($id)
    {
        return $this->db->get('jadwal_bimbingan')->row_array();
    }
}
