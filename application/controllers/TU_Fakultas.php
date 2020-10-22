<?php
defined('BASEPATH') or exit('No direct script access allowed');
class TU_Fakultas extends CI_Controller
{

    public function index()
    {
        /* Mencegah Masuk tanpa login */
        if (!$this->session->userdata('username')) {
            redirect('Account');
        } else {
            $this->load->model('Sertifikasi_model');
        }

        /* Pengolahan Data */
        $data['username'] = $this->session->userdata('username');
        $data['level_akun'] = $this->session->userdata('level_akun');
        $data['id_fakultas'] = $this->session->userdata('id_fakultas');

        /* Load View */
        $this->load->view('tu_fakultas/Dashboard', $data);
    }

    public function mahasiswa()
    {
        $this->load->model('Sertifikasi_model');
        $this->form_validation->set_rules('checkKonfirmasi', 'Check', 'required');

        if ($this->form_validation->run()) {
            if ($this->input->post('kodeDelete')) { // Delete

                $idDelete = $this->input->post('kodeDelete');
                $this->Sertifikasi_model->deleteMahasiswa($idDelete);


                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil DELETE Data Mahasiswa.</div>');
                redirect('TU_Fakultas/mahasiswa');
            } else if ($this->input->post('idTambahMhs')) { // Tambah

                $query = [
                    'nim' => $this->input->post('idTambahMhs'),
                    'nama' => $this->input->post('namaMhs'),
                    'alamat' => $this->input->post('alamatMhs'),
                    'tanggal_lahir' => $this->input->post('lahirMhs'),
                    'gender' => $this->input->post('genderMhs'),
                    'agama' => $this->input->post('agamaMhs'),
                    'fakultas' => $this->input->post('fakultasMhs'),
                    'prodi' => $this->input->post('prodiMhs')
                ];
                $this->Sertifikasi_model->insertMahasiswa($query);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil TAMBAH Data Mahasiswa.</div>');
                redirect('TU_Fakultas/mahasiswa');
            } else if ($this->input->post('idEditMhs')) { // Edit Running Text

                $idEdit = $this->input->post('idEditMhs');
                $query = [
                    'nama' => $this->input->post('namaMhs'),
                    'alamat' => $this->input->post('alamatMhs'),
                    'tanggal_lahir' => $this->input->post('lahirMhs'),
                    'gender' => $this->input->post('genderMhs'),
                    'agama' => $this->input->post('agamaMhs'),
                    'fakultas' => $this->input->post('fakultasMhs'),
                    'prodi' => $this->input->post('prodiMhs')
                ];
                $this->Sertifikasi_model->updateMahasiswa($idEdit, $query);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil EDIT Data Mahasiswa.</div>');
                redirect('TU_Fakultas/mahasiswa');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal TAMBAH/EDIT/DELETE Data Mahasiswa.</div>');
                redirect('TU_Fakultas/mahasiswa');
            }
        } else {
            /* Mencegah Masuk tanpa login */
            if (!$this->session->userdata('username')) {
                redirect('Account');
            } else {
                $this->load->model('Sertifikasi_model');
            }

            /* Pengolahan Data */
            $data['username'] = $this->session->userdata('username');
            $data['level_akun'] = $this->session->userdata('level_akun');
            $data['id_fakultas'] = $this->session->userdata('id_fakultas');
            $data['fakultas'] = $this->Sertifikasi_model->get_nama_fakultas($data['id_fakultas']);
            $data['data_mahasiswa'] = $this->Sertifikasi_model->getAllMahasiswaFakultas($data['fakultas']['nama_fakultas']);
            $data['prodi_user'] = $this->Sertifikasi_model->get_prodi($data['id_fakultas']);

            /* Load View */
            $this->load->view('tu_fakultas/Data_mahasiswa', $data);
        }
    }
}
