<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Account extends CI_Controller
{
    public function index()
    {
        /* Harus logout terlebih dahulu */
        if ($this->session->userdata('username')) {
            if ($this->session->userdata('level_akun') == "akademik") {
                redirect('Akademik'); // dashboard akademik
            } else if ($this->session->userdata('level_akun') == "tu_fakultas") {
                redirect('TU_Fakultas'); //dashboard TU
            }
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run()) {
            $this->pvt_login();
        } else {
            $this->load->view('account/Login');
        }
    }

    private function pvt_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->load->model('Sertifikasi_model');
        $user = $this->Sertifikasi_model->get_user($username);

        if ($user) {
            // user ada
            // cek password
            if ($password == $user['password']) {
                $akun = [
                    'username' => $user['username'],
                    'level_akun' => $user['level_akun'],
                    'id_fakultas' => $user['id_fakultas']
                ];
                $this->session->set_userdata($akun);

                if ($user['level_akun'] == "akademik") {
                    redirect('Akademik'); // dashboard akademik
                } else {
                    redirect('TU_Fakultas'); //dashboard TU
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Mohon maaf PASSWORD salah. Mohon Ulangi lagi!</div>');
                redirect('Account');
            }
        } else {
            // user tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Mohon maaf USERNAME tidak ditemukan. Mohon Ulangi lagi!</div>');
            redirect('Account');
        }
    }

    public function logout()
    {
        /* Harus login terlebih dahulu */
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak Ada akun yang login.</div>');
            redirect('Account');
        }

        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level_akun');
        $this->session->unset_userdata('id_fakultas');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout.</div>');
        redirect('Account');
    }
}
