<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class peserta extends RAST_Control {

    private $data;

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('level') != 1) {
            redirect('dashboard');
        }

        $this->load->model('M_peserta');
    }

    function index() {

        $isi = array(
            'descript' => 'Slide yang ditampilkan'
        , 'dataTable' => $this->M_peserta->get_list()
        , 'add_button' => true
        , 'back_button' => false
        );

        $this->set_page('peserta', $isi['descript'], 'peserta', $isi);
    }

    function form() {
        $this->output->set_content_type('application/json');

        $id = $_POST['id'];
        echo json_encode($this->M_peserta->get_isi($id));
    }


    function process() {
        if ($this->session->userdata('level') < 1) {
            redirect('dashboard');
        }

        $post1 = $_POST;

        $file = rand(1000,100000)."_".$_FILES['gambarpeserta']['name'];
        $file_loc = $_FILES['gambarpeserta']['tmp_name'];
        $file_size = $_FILES['gambarpeserta']['size'];
        $file_type = $_FILES['gambarpeserta']['type'];
        $folder="assets/images/gambarpeserta/";

        if (move_uploaded_file($file_loc,$folder.$file)) {
            $post = array_merge($post1, array("gambarpeserta" => $file));

            if ($this->M_peserta->process($post)) {
                $this->session->set_userdata('pesan_sistem', 'Selamat! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' peserta, SUKSES!');
                $this->session->set_userdata('tipe_pesan', 'Sukses');
            } else {
                $this->session->set_userdata('pesan_sistem', 'Maaf! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' peserta, GAGAL! Silahkan periksa dan coba kembali');
                $this->session->set_userdata('tipe_pesan', 'Gagal');
            }
        } else {
            if ($this->M_peserta->process($post1)) {
                $this->session->set_userdata('pesan_sistem', 'Selamat! ' . (($post1['id'] == '') ? 'Penambahan' : 'Perubahan') . ' peserta, SUKSES!');
                $this->session->set_userdata('tipe_pesan', 'Sukses');
            } else {
                $this->session->set_userdata('pesan_sistem', 'Maaf! ' . (($post1['id'] == '') ? 'Penambahan' : 'Perubahan') . ' peserta, GAGAL! Silahkan periksa dan coba kembali');
                $this->session->set_userdata('tipe_pesan', 'Gagal');
            }
        }

        redirect('peserta');
    }
    function nonaktifkan($a)
    {
        if ($this->M_peserta->nonaktifkan($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! peserta telah dinonaktifkan!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('peserta');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! peserta tidak ternonaktifkan! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('peserta');
        }
    }
    function aktifkan($a)
    {
        if ($this->M_peserta->aktifkan($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! peserta telah diaktifkan!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('peserta');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! peserta tidak teraktifkan! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('peserta');
        }
    }
    function delete($a) {
        if ($this->M_peserta->delete($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! peserta telah dihapus!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('peserta');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! peserta tidak terhapus! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('peserta');
        }
    }

    function set_page($menu, $descript, $file, $isi) {
        $data['menu'] = $menu;
        $data['descript'] = $descript;

        $data['content'] = $this->load->view($file, $isi, TRUE);
        $this->load->view('template/template', $data);
    }
}
