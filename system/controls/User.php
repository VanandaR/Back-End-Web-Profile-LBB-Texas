<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends RAST_Control {   

    private $data;

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('level') != 1) {
            redirect('dashboard');
        }

        $this->load->model('M_user');
    }

    function index() {
        $isi = array(
            'descript' => 'Pengguna Pada Sistem'
            , 'dataTable' => $this->M_user->get_list()
            , 'add_button' => true
            , 'back_button' => false
        );

        $this->set_page('user', $isi['descript'], 'user', $isi);
    }

    function form() {
    	$this->output->set_content_type('application/json');

    	$id = $_POST['id'];
        echo json_encode($this->M_user->get_isi($id));
    }

    function changePassword() {
        $isi = array(
            'descript' => 'Ubah Password User'
            , 'isi' => NULL
            , 'add_button' => true
            , 'back_button' => false
        );
        $this->set_page('user', $isi['descript'], 'changePassword', $isi);
    }

    function changePassword_process() {
        $post = $_POST;
        if ($post['new_password'] == $post['confirm_password']) {
            if ($this->M_user->changePassword_process($post)) {
                $this->session->set_userdata('pesan_sistem', 'Selamat! Perubahan password, SUKSES!');
                $this->session->set_userdata('tipe_pesan', 'Sukses');
                redirect('login/logout');
            } else {
                $this->session->set_userdata('pesan_sistem', 'Maaf! Perubahan password, GAGAL! Silahkan periksa dan coba kembali');
                $this->session->set_userdata('tipe_pesan', 'Gagal');
                redirect('user/changePassword');
            }
        } else {
            $this->session->set_userdata('pesan_sistem', 'Konfirmasi password tidak sesuai dengan password baru! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('user/changePassword');
        }
    }

    function process() {
        $post = $_POST;
        if ($this->M_user->process($post)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' user, SUKSES!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('user');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' user, GAGAL! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('user');
        }
    }

    function delete($a) {
        if ($this->M_user->delete($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! User telah dihapus!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('user');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! User tidak terhapus! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('user');
        }
    }

    function set_page($menu, $descript, $file, $isi) {
        $data['menu'] = $menu;
        $data['descript'] = $descript;

        $data['content'] = $this->load->view($file, $isi, TRUE);
        $this->load->view('template/template', $data);
    }
}
