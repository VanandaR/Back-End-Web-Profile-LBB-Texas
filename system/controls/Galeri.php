<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Galeri extends RAST_Control {

    private $data;

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('level') != 1) {
            redirect('dashboard');
        }

        $this->load->model('M_galeri');
    }

    function index() {

        $isi = array(
            'descript' => 'Slide yang ditampilkan'
        , 'dataTable' => $this->M_galeri->get_list()
        , 'add_button' => true
        , 'back_button' => false
        );

        $this->set_page('galeri', $isi['descript'], 'galeri', $isi);
    }

    function form() {
        $this->output->set_content_type('application/json');

        $id = $_POST['id'];
        echo json_encode($this->M_galeri->get_isi($id));
    }


    function process() {
        if ($this->session->userdata('level') < 1) {
            redirect('dashboard');
        }

        $post1 = $_POST;

        $file = rand(1000,100000)."_".$_FILES['gambargaleri']['name'];
        $file_loc = $_FILES['gambargaleri']['tmp_name'];
        $file_size = $_FILES['gambargaleri']['size'];
        $file_type = $_FILES['gambargaleri']['type'];
        $folder="assets/images/gambargaleri/";

        if (move_uploaded_file($file_loc,$folder.$file)) {
            $post = array_merge($post1, array("gambargaleri" => $file));

            if ($this->M_galeri->process($post)) {
                $this->session->set_userdata('pesan_sistem', 'Selamat! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' galeri, SUKSES!');
                $this->session->set_userdata('tipe_pesan', 'Sukses');
            } else {
                $this->session->set_userdata('pesan_sistem', 'Maaf! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' galeri, GAGAL! Silahkan periksa dan coba kembali');
                $this->session->set_userdata('tipe_pesan', 'Gagal');
            }
        } else {
            if ($this->M_galeri->process($post1)) {
                $this->session->set_userdata('pesan_sistem', 'Selamat! ' . (($post1['id'] == '') ? 'Penambahan' : 'Perubahan') . ' galeri, SUKSES!');
                $this->session->set_userdata('tipe_pesan', 'Sukses');
            } else {
                $this->session->set_userdata('pesan_sistem', 'Maaf! ' . (($post1['id'] == '') ? 'Penambahan' : 'Perubahan') . ' galeri, GAGAL! Silahkan periksa dan coba kembali');
                $this->session->set_userdata('tipe_pesan', 'Gagal');
            }
        }

        redirect('galeri');
    }
    function nonaktifkan($a)
    {
        if ($this->M_galeri->nonaktifkan($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! galeri telah dinonaktifkan!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('galeri');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! galeri tidak ternonaktifkan! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('galeri');
        }
    }
    function aktifkan($a)
    {
        if ($this->M_galeri->aktifkan($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! galeri telah diaktifkan!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('galeri');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! galeri tidak teraktifkan! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('galeri');
        }
    }
    function delete($a) {
        if ($this->M_galeri->delete($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! galeri telah dihapus!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('galeri');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! galeri tidak terhapus! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('galeri');
        }
    }

    function set_page($menu, $descript, $file, $isi) {
        $data['menu'] = $menu;
        $data['descript'] = $descript;

        $data['content'] = $this->load->view($file, $isi, TRUE);
        $this->load->view('template/template', $data);
    }
}
