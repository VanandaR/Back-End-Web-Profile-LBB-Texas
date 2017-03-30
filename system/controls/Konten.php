<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konten extends RAST_Control {

    private $data;

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('level') != 1) {
            redirect('dashboard');
        }

        $this->load->model('M_konten');
    }

    function index() {

        $isi = array(
            'descript' => 'Slide yang ditampilkan'
        , 'dataTable' => $this->M_konten->get_list()
        , 'add_button' => true
        , 'back_button' => false
        , 'kategori' =>$this->M_konten->get_kategori()
        );

        $this->set_page('konten', $isi['descript'], 'konten', $isi);
    }

    function form() {
        $this->output->set_content_type('application/json');

        $id = $_POST['id'];
        echo json_encode($this->M_konten->get_isi($id));
    }
    function kategori() {
        $this->output->set_content_type('application/json');

        $id = $_POST['id'];
        echo json_encode($this->M_konten->get_kategori());
    }


    function process() {
        if ($this->session->userdata('level') < 1) {
            redirect('dashboard');
        }

        $post1 = $_POST;
        $background = rand(1000,100000)."_".$_FILES['gambarbackground']['name'];
        $background_loc = $_FILES['gambarbackground']['tmp_name'];
        $file = rand(1000,100000)."_".$_FILES['gambarkonten']['name'];
        $file_loc = $_FILES['gambarkonten']['tmp_name'];

        $folder="assets/images/gambarkonten/";
        $folderbackground="assets/images/gambarbackground/";


        if (move_uploaded_file($file_loc,$folder.$file)  || move_uploaded_file($background_loc,$folderbackground.$background)) {
            $post = array_merge($post1, array("gambarkonten" => $file,"gambarbackground"=>$background));
            if ($this->M_konten->process($post)) {
                $this->session->set_userdata('pesan_sistem', 'Selamat! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' konten, SUKSES!');
                $this->session->set_userdata('tipe_pesan', 'Sukses');
            } else {
                $this->session->set_userdata('pesan_sistem', 'Maaf! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' konten, GAGAL! Silahkan periksa dan coba kembali');
                $this->session->set_userdata('tipe_pesan', 'Gagal');
            }
        } else {
            if ($this->M_konten->process($post1)) {
                $this->session->set_userdata('pesan_sistem', 'Selamat! ' . (($post1['id'] == '') ? 'Penambahan' : 'Perubahan') . ' konten, SUKSES!');
                $this->session->set_userdata('tipe_pesan', 'Sukses');
            } else {
                $this->session->set_userdata('pesan_sistem', 'Maaf! ' . (($post1['id'] == '') ? 'Penambahan' : 'Perubahan') . ' konten, GAGAL! Silahkan periksa dan coba kembali');
                $this->session->set_userdata('tipe_pesan', 'Gagal');
            }
        }

        redirect('konten');
    }
    function nonaktifkan($a)
    {
        if ($this->M_konten->nonaktifkan($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! konten telah dinonaktifkan!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('konten');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! konten tidak ternonaktifkan! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('konten');
        }
    }
    function aktifkan($a)
    {
        if ($this->M_konten->aktifkan($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! konten telah diaktifkan!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('konten');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! konten tidak teraktifkan! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('konten');
        }
    }
    function delete($a) {
        if ($this->M_konten->delete($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! konten telah dihapus!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('konten');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! konten tidak terhapus! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('konten');
        }
    }

    function set_page($menu, $descript, $file, $isi) {
        $data['menu'] = $menu;
        $data['descript'] = $descript;

        $data['content'] = $this->load->view($file, $isi, TRUE);
        $this->load->view('template/template', $data);
    }
}
