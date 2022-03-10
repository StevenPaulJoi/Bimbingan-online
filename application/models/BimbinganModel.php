<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BimbinganModel extends CI_Model
{
    public function getJadwalBySiswa($where)
    {
        $this->db->select("*");
    
        $this->db->join('pengajuan pg', 'pengajuan_id', 'left');
        $this->db->join('mahasiswa m', 'mhs_id', 'left');


        return $this->db->get_where('jadwal_bimbingan jb', $where)->result();
    }

    public function get($id)
    {
        $this->db->select("*,b.status as status_bimbingan");
        
        $this->db->join('pengajuan pg', 'pengajuan_id', 'left');
        $this->db->join('mahasiswa m', 'mhs_id', 'left');

        return $this->db->get_where('bimbingan b', ['bimbingan_id' => $id])->row();
    }

    public function cekJadwal($pengajuan_id)
    {
        $time = date('Y-m-d H:i:s');

        $this->db->where('tgl_mulai <=', $time);
        $this->db->where('pengajuan_id', $pengajuan_id);
        $result = $this->db->get('jadwal_bimbingan')->result_array();
        
        return count($result) > 0 ? true : false;
    }

    public function getByPengajuan($pengajuan_id)
    {
        $this->db->join('pengajuan', 'pengajuan_id', 'left');
        return $this->db->get_where('bimbingan', ['pengajuan_id'=>$pengajuan_id])->result();
    }

    public function getReviewer($where)
    {
        $this->db->distinct('r.review_id');
        $this->db->join('staff s', 'staff_id', 'left');
        $this->db->join('pembimbing p', 'staff_id', 'left');
        return $this->db->get_where('review r', $where)->result();
    }
}
