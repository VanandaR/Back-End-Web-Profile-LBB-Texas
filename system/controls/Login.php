<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends RAST_Control {

    private $data;

    public function __construct() {
        parent::__construct();

        $this->load->model('M_login');
    }

    function index() {


        if ($this->M_login->getUser() > 0) {
            redirect('dashboard');
        } else {
            $this->load->view('login');
        }
    }

//=====================================================
// End of View
//=====================================================
//
//
//
//
//
//=====================================================
// Process
//=====================================================

    function site() {
        if ($_POST) {
            $u = $_POST['username'];
            $p = $_POST['password'];

            if (empty($u) || empty($p)) {
                redirect('login');
            } else {
                if ($this->M_login->login($u, $p)) {
                    $this->session->set_userdata('pesan_sistem', 'Selamat! Anda berhasil login!');
                    $this->session->set_userdata('tipe_pesan', 'Sukses');
                    redirect('login');
                } else {
                    $this->session->set_userdata('pesan_sistem', 'Username atau Password SALAH!<br />Silahkan periksa dan coba kembali');
                    $this->session->set_userdata('tipe_pesan', 'Gagal');
                    redirect('login');
                }
            }
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

//=====================================================
// End of Process
//=====================================================
}
