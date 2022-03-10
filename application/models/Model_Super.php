<?php
class Model_super extends CI_Model
{
    public function prodi()
    {
        return $this->db->get('prodi');
    }

    public function kelas()
    {
        return $this->db->get('kelas');
    }

    public function mahasiswa()
    {
        return $this->db->get('mahasiswa');
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function getProdi()
    {
        return $this->db->get('prodi');
    }

    public function getKelas()
    {
        return $this->db->get('kelas');
    }
}
