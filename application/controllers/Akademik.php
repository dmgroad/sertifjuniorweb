<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Akademik extends CI_Controller
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
        $this->load->view('akademik/Dashboard', $data);
    }

    public function mahasiswa()
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
        $data['data_mahasiswa'] = $this->Sertifikasi_model->getAllMahasiswa();

        /* Load View */
        $this->load->view('akademik/Data_mahasiswa', $data);
    }
}
