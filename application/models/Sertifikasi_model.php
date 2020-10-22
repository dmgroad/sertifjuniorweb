<?php
class Sertifikasi_model extends CI_Model
{

    public function get_user($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    public function getAllMahasiswa()
    {
        return $this->db->get('mahasiswa')->result_array();
    }
    public function getAllMahasiswaFakultas($fakultas)
    {
        $this->db->order_by('input_time DESC');
        return $this->db->get_where('mahasiswa', ['fakultas' => $fakultas])->result_array();
    }

    public function deleteMahasiswa($nim)
    {
        $this->db->where('nim', $nim);
        $this->db->delete('mahasiswa');
    }

    public function insertMahasiswa($query)
    {
        $this->db->insert('mahasiswa', $query);
    }

    public function updateMahasiswa($nim, $query)
    {
        $this->db->where('nim', $nim);
        $this->db->update('mahasiswa', $query);
    }

    public function get_prodi($id_fakultas)
    {
        return $this->db->get_where('prodi', ['id_fakultas' => $id_fakultas])->result_array();
    }
    public function get_nama_fakultas($id_fakultas)
    {
        return $this->db->get_where('fakultas', ['id_fakultas' => $id_fakultas])->row_array();
    }
}
